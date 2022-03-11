<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Coupon;


class UserAddCouponsComponent extends Component
{

    public $code;
    public $value;
    public $type;
    public $cart_value;
    public $user_id;
    public $expiry_date;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);
    }

    public function storeCoupon()
    {
        $this->validate([
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);

        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->user_id= auth()->id();
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        session()->flash('message','Coupon has been created successfully!');

    }
    public function render()
    {
        return view('livewire.user.user-add-coupons-component')->layout('layouts.base');
    }
}
