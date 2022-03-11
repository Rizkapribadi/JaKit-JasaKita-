<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use Auth;


class UserDashboardComponent extends Component
{
    public function render()
    {
        
        $orders = Order::orderBy('created_at','DESC')->whereHas('jasa', function($q){
            $q->where('user_id', auth()->id());})->paginate(12);
        $totalSales = Order::where('status','delivered')->whereHas('jasa', function($q){
            $q->where('user_id', auth()->id());})->count();
        $totalRevenue = Order::where('status','delivered')->whereHas('jasa', function($q){
            $q->where('user_id', auth()->id());})->sum('total');
        $todaySales = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->count();
        $todayRevenue = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->sum('total');
        return view('livewire.user.user-dashboard-component',[
            'orders'=>$orders,
            'totalSales'=>$totalSales,
            'totalRevenue'=>$totalRevenue,
            'todaySales'=>$todaySales,
            'todayRevenue'=>$todayRevenue
        ])->layout('layouts.base');
    }
}
