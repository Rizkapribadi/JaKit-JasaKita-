<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Order;
use App\Models\Jasa;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $users = User::orderBy('id','DESC')->count();
        $jasas = Jasa::orderBy('id','DESC')->count();
        $totalRevenue = Order::where('status','delivered')->sum('total');
        $mitras = User::whereHas('jasa')->count();
        $orders = Order::orderBy('created_at','DESC')->paginate(5);
        return view('livewire.admin.admin-dashboard-component', ['users'=>$users,'jasas'=>$jasas,'totalRevenue'=>$totalRevenue,'mitras'=>$mitras,'orders'=>$orders])->layout('layouts.base');
    }
}
