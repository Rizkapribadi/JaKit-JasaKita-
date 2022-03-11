<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Coupon;
use Livewire\WithPagination;
use Auth;
use App\Models\User;

class UserCouponsComponent extends Component
{

    public function deleteCoupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        session()->flash('message','Coupon has been deleted successfully!');
    }
    public function render()
    {
        $coupons = Coupon::where('user_id', Auth::user()->id)->orderBy('id','DESC')->with('user')->paginate(5);
        return view('livewire.user.user-coupons-component',['coupons'=>$coupons])->layout('layouts.base');
    }
}
