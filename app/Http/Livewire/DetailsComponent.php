<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jasa;
use App\Models\Sale;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $qty;

    public function store($jasa_id,$jasa_name,$jasa_price)
    {

        Cart::instance('cart')->add($jasa_id,$jasa_name,$this->qty,$jasa_price)->associate('App\Models\Jasa');
        session()->flash('success_message','Item berhasil ditambahkan');
        return redirect()->route('jasa.cart');
    }
    public function mount($slug){

        $this->slug=$slug;
        $this->qty=1;
    }
public function increaseQuantity(){

    $this->qty++;
}
public function decreaseQuantity(){

    if($this->qty > 1){

        $this->qty--;
    }
}

    public function render()
    {
        $jasa = Jasa::where('slug', $this->slug)->first();
        $popular_jasas=Jasa::inRandomOrder()->limit(4)->get();
        $related_jasas=Jasa::where('category_id',$jasa->category_id)->inRandomOrder()->limit(5)->get();
        $sale = Sale::find(1);
        return view('livewire.details-component',['jasa'=>$jasa,'popular_jasas'=>$popular_jasas,'related_jasas'=>$related_jasas,'sale'=>$sale])->layout('layouts.base');
    }
}
