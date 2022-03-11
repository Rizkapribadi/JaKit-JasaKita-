<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Coupon;

class UserEditCouponsComponent extends Component
{
    public $code;
    public $value;
    public $type;
    public $cart_value;
    public $expiry_date;

    public $coupon_id;
    public $user_id;

    public function mount($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $this->code =  $coupon->code;
        $this->type = $coupon->type;
        $this->value = $coupon->value;
        $this->cart_value = $coupon->cart_value;
        $this->coupon_id =  $coupon->id;
        $this->user_id= $coupon->user_id;
        $this->expiry_date = $coupon->expiry_date;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'code' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);
    }

    public function updateCoupon()
    {
        $this->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);

        $coupon = Coupon::find($this->coupon_id);
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->user_id= auth()->id();
        $coupon->expiry_date=$this->expiry_date;
        $coupon->save();
        session()->flash('message','Coupon has been updated successfully!');

    }
    public function render()
    {
        return view('livewire.user.user-edit-coupons-component')->layout('layouts.base');
    }
}
