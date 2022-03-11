<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use App\Models\Jasa;
use Auth;
use Livewire\WithPagination;

class SellerOrderComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at','DESC')->whereIn('status',['delivered','canceled'])->whereHas('jasa', function($q){
            $q->where('user_id', auth()->id());})->paginate(12);

        $ordersi = Order::where('status','ordered')->whereHas('jasa', function($q){
            $q->where('user_id', auth()->id());})->paginate(12);
        return view('livewire.user.seller-order-component',['orders'=>$orders,'ordersi'=>$ordersi])->layout('layouts.base');
    }
}
