<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\Jasa;
use Livewire\WithPagination;

class FilterRegionComponent extends Component
{

 
    public function render()
    {
        
        $provinces = Province::all();
       
        return view('livewire.filter-region-component',['provinces'=>$provinces])->layout('layouts.base');
    }
}