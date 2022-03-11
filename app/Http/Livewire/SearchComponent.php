<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jasa;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Province;
use Cart;

class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $search;
    public $jasa_cat;
    public $jasa_cat_id; 

    
    public function mount(){

        $this->sorting="default";
        $this->pagesize="12";
        $this->fill(request()->only('search','jasa_cat','jasa_cat_id'));
    }
    use WithPagination;
    public function render()
    {
        $popular_jasas=Jasa::inRandomOrder()->limit(4)->get();
        if($this->sorting=='date')
        {
            $jasas = Jasa::where('name','like','%'.$this->search . '%')->where('category_id','like','%'.$this->jasa_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price")
        {
            $jasas = Jasa::where('name','like','%'.$this->search . '%')->where('category_id','like','%'.$this->jasa_cat_id.'%')->orderBy('price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price-desc")
        {
            $jasas = Jasa::where('name','like','%'.$this->search . '%')->where('category_id','like','%'.$this->jasa_cat_id.'%')->orderBy('price','DESC')->paginate($this->pagesize);
        }
        else{
            $jasas = Jasa::where('name','like','%'.$this->search . '%')->where('category_id','like','%'.$this->jasa_cat_id.'%')->paginate($this->pagesize);

        }
        $categories = Category::all();
        return view('livewire.search-component',['jasas'=>$jasas,'categories'=>$categories,'popular_jasas'=>$popular_jasas])->layout("layouts.base");
    }
}
