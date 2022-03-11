<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Coupon;
use Carbon\Carbon;
use Auth;

class CartComponent extends Component
{

    public $haveCoupon;
    public $couponCode;
    public $discount;
    public $totalAfterDiscount;

    public function increaseQuantity($rowId)
    {

        $jasa = Cart::instance('cart')->get($rowId);
        $qty = $jasa->qty + 1;
        Cart::update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {

        $jasa = Cart::instance('cart')->get($rowId);
        $qty = $jasa->qty - 1;
        Cart::update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    

    

   
    public function destroy($rowId)
    {

        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success_message', 'Item berhasil dihapus');
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function turnToSaveLater($rowId){

        $item= Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Jasa');
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success_message','Item berhasil disimpan untuk nanti');
    }

    public function moveToCart($rowId)
    {
        $item= Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Jasa');
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('s_success_message','Item berhasil dipindah ke cart');
    }

    public function deleteFromSaveForLater($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);
        session()->flash('s_success_message','Item sudah dihapus dari Simpan Nanti');
    }

    public function applyCouponCode()
    {

        $coupon = Coupon::where('code', $this->couponCode)->where('expiry_date','>=',Carbon::today())->where('cart_value','<=', Cart::instance('cart')->subtotal())->first();
        if(!$coupon)
        {
            session()->flash('coupon_message','Coupon Code is invalid!');
            return;
        }

        session()->put('coupon',[
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value
        ]);
    }

    public function calculateDiscounts()
    {
        if(session()->has('coupon'))
        {
            if(session()->get('coupon')['type'] == 'fixed')
            {
                $this->discount = session()->get('coupon')['value'];
            }
            else
            {
                $this->discount = (Cart::instance('cart')->total() * session()->get('coupon')['value'])/100;
            }

            $this->totalAfterDiscount = Cart::instance('cart')->total() - $this->discount;
        }
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
    }

    public function checkout()
    {

        if (Auth::check()) {

            return redirect()->route('checkout');
        } 
        else {

            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if(!Cart::instance('cart')->count() > 0){
            session()->forget('checkout');
            return;
        }

        if(session()->has('coupon'))
        {
            session()->put('checkout',[
                'discount' => $this->discount,
                'total' => $this->totalAfterDiscount
            ]);
        }
        else
        {
            session()->put('checkout',[
                'discount' => 0,
                'total' => Cart::instance('cart')->total()
            ]);
        }
    
    }

    public function render()
    {

        if(session()->has('coupon'))
        {
            if(Cart::instance('cart')->total() < session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }
            else{
                $this->calculateDiscounts();
            }
        }

        $this->setAmountForCheckout();
        
        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
           
        }
        return view('livewire.cart-component')->layout('layouts.base');
    }
    
}
