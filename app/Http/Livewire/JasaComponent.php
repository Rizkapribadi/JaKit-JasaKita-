<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jasa;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Province;
use Cart;
use Auth;

class JasaComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $pagesize; 
    public $min_price;
    public $max_price; 

    
    public function mount(){

        $this->sorting = "default";
        $this->pagesize = "12";
        $this->min_price = 1;
        $this->max_price = 100000;
    }

    public function addToFavorite($jasa_id, $jasa_name, $jasa_price)
    {
        
        Cart::instance('wishlist')->add($jasa_id, $jasa_name, 1, $jasa_price)->associate('App\Models\Jasa');
        $this->emitTo('favorite-count-component','refreshComponent');
    }
   
    public function removeFromFavorite($jasa_id){
        foreach(Cart::instance('wishlist')->content() as $fitem){

            if($fitem->id == $jasa_id){
                Cart::instance('wishlist')->remove($fitem->rowId);
                $this->emitTo('favorite-count-component','refreshComponent');
                return;
            }
        }

    }
    public function render()
    {
        

        if($this->sorting=='date')
        {
            $jasas = Jasa::whereBetween('price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price")
        {
            $jasas = Jasa::whereBetween('price',[$this->min_price,$this->max_price])->orderBy('price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price-desc")
        {
            $jasas = Jasa::whereBetween('price',[$this->min_price,$this->max_price])->orderBy('price','DESC')->paginate($this->pagesize);
        }
        else{
            $jasas = Jasa::whereBetween('price',[$this->min_price,$this->max_price])->paginate($this->pagesize);

        }
        $categories = Category::all();

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }

        $popular_jasas=Jasa::whereBetween('price',[$this->min_price,$this->max_price])->inRandomOrder()->limit(4)->get();
        return view('livewire.jasa-component',['jasas'=>$jasas,'categories'=>$categories,'popular_jasas'=>$popular_jasas])->layout("layouts.base");
    }
    
}
