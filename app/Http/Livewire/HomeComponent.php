<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jasa;
use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\Advertisement;
use Auth;
use Cart;


class HomeComponent extends Component
{
    public function render()
    {
        $ljasas = Jasa::orderBy('created_at','DESC')->get()->take(9);
        $category=HomeCategory::find(1);
        $cats=explode(',',$category->sel_categories);
        $categories = Category::whereIn('id',$cats)->get();
        $no_of_jasa = $category->no_of_jasa;
        $ads = Advertisement::where('status',1)->get();
       
        if(Auth::check())
        {
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }
        return view('livewire.home-component',['ljasas'=>$ljasas,'categories'=> $categories,'no_of_jasa'=>$no_of_jasa,'ads'=>$ads])->layout('layouts.base');
    }
}
