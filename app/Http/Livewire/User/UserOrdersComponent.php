<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Auth;
use DB;

class UserOrdersComponent extends Component
{

    public function updateOrderStatus($order_id, $status){
        $order = Order::find($order_id);
        $order->status = $status;
        if($status == "delivered")
        {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }
        else if($status == "canceled")
        {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_message','Order status has been updated successfuly!');

    }
    public function render()
    {
        $orders = Order::orderBy('created_at','DESC')->where('status','ordered')->where('user_id', Auth::user()->id)->paginate(10);
        $ordersi = Order::orderBy('created_at','DESC')->whereIn('status',['delivered','canceled'])->where('user_id', Auth::user()->id)->paginate(10);
        return view('livewire.user.user-orders-component',['orders'=>$orders,'ordersi'=>$ordersi])->layout('layouts.base');
    }
}
