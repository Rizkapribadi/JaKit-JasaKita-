<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jasa;
use App\Models\Sale;
use App\Models\Category;

class PromoComponent extends Component
{
    public function render()
    {
        $sjasas = Jasa::where('sale_price','>',0)->inRandomOrder()->get()->take(10);
        $sale = Sale::find(1);
        return view('livewire.promo-component',['sjasas'=>$sjasas,'sale'=>$sale])->layout('layouts.base');
    }
}
