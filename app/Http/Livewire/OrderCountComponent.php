<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Order;

class OrderCountComponent extends Component
{
    public function render()
    {
        $orders = Order::where('status','ordered')->whereHas('jasa', function($q){
            $q->where('user_id', auth()->id());})->count();
        return view('livewire.order-count-component',['orders'=>$orders])->layout('layouts.base');
    }
}
