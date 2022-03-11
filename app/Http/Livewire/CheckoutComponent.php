<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Regency;
use App\Models\Province;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Models\User;
use Cart;
use Auth;

class CheckoutComponent extends Component
{
    public $ship_to_different;

    public $s_name;
    public $s_phoneNumber;
    public $s_email;
    public $s_address;
    public $s_province_id;
    public $s_regency_id;

    public $paymentmethod;

    public $thankyou;

    public $selectedProvince = null;
    public $selectedProvince2 = null;
    public $provinces;
    public $regencies;



    public function mount()
    {
       

        $this->provinces = Province::all();
        $this->regencies = collect();

      
    }

    public function updated($fields)
    {

        $this->validateOnly($fields,[

            'paymentmethod' => 'required'
        ]); 

        if($this->ship_to_different)
        {
            $this->validateOnly($fields,[
                's_name' => 'required',
                's_phoneNumber' => 'required|numeric',
                's_email' => 'required|email',
                's_address' => 'required',
                's_province_id' => 'required',
                's_regency_id' => 'required'
            ]);
        }
    }

    public function placeOrder(){

        $this->validate([
           
            'paymentmethod' => 'required'
        ]);

        foreach(Cart::instance('cart')->content() as $item){
        $order = New Order();
        $order->user_id = Auth::user()->id;   
        $order->penjual_id = $item->model->user_id;
        $order->jasa_id = $item->id;
        $order->discount = session()->get('checkout')['discount'];
        $order->total = session()->get('checkout')['total'];
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1:0; 
        $order->save();
    }

        foreach(Cart::instance('cart')->content() as $item){

            $orderItem = New OrderItem();
            $orderItem->jasa_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if($this->ship_to_different)
        {

            $this->validate([
                's_name' => 'required',
                's_phoneNumber' => 'required|numeric',
                's_email' => 'required|email',
                's_address' => 'required',
                's_province_id' => 'required',
                's_regency_id' => 'required'
            ]);

            $shipping = New Shipping();
            $shipping->order_id = $order->id;
            $shipping->name = $this->s_name;
            $shipping->phoneNumber = $this->s_phoneNumber;
            $shipping->email = $this->s_email;
            $shipping->address = $this->s_address;
            $shipping->regency_id = $this->s_regency_id;
            $shipping->province_id = $this->s_province_id;
            $shipping->save();
        }

        if($this->paymentmethod == 'cod')
        {
            $transaction = New Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode ='cod';
            $transaction->status = 'pending';
            $transaction->save();
        }

        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');

    }

    public function verifyForCheckout(){

      
        if(!Auth::check())
        {

            return redirect()->route('login');
        }
        else if($this->thankyou)
        {

            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {

            return redirect()->route('jasa.cart');
        }
    }

    public function updatedSelectedProvince($province)
    {
        if(!is_null($province)){
            $this->regencies=Regency::where('province_id',$province)->get();
        }

    }

    public function updatedSelectedProvince2($province)
    {
        if(!is_null($province)){
            $this->regencies=Regency::where('province_id',$province)->get();
        }

    }

    public function render()
    {
        $users = User::where('id', Auth::user()->id)->get();
        
        $this->verifyForCheckout();
        return view('livewire.checkout-component',['users'=>$users])->layout('layouts.base');
    }
}
