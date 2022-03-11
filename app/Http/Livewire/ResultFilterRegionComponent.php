<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\Jasa;
use Livewire\WithPagination;

class ResultFilterRegionComponent extends Component
{

    public $province_id;

    public function mount($province_id){

   
        $this->province_id=$province_id;
  
       
    } 

    public function render()
    {

        $province = Province::where('id',$this->province_id)->first();
        $provinces = Province::all();
        $province_id=$province->id;
        $province_name=$province->name;
        $jasas = Jasa::where('province_id',$province_id)->orderBy('price','ASC')->get();
        return view('livewire.result-filter-region-component',['jasas'=>$jasas,'provinces'=>$provinces,'province_name'=>$province_name])->layout('layouts.base');
    }
}
