<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jasa;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Subcategory;
class CategoryComponent extends Component
{

    public $sorting;
    public $pagesize; 
    public $category_slug; 
    public $min_price;
    public $max_price; 
    

    public function mount($category_slug){

        $this->sorting="default";
        $this->pagesize="12";
        $this->category_slug=$category_slug;
        $this->min_price = 1;
        $this->max_price = 100000;
       
    }
    use WithPagination;
    public function render()
    {
        $category = Category::where('slug',$this->category_slug)->first();
       
        $category_id=$category->id;
        $category_name=$category->name;
        
        if($this->sorting=='date')
        {
            $jasas = Jasa::whereBetween('price',[$this->min_price,$this->max_price])->where('category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price")
        {
            $jasas = Jasa::whereBetween('price',[$this->min_price,$this->max_price])->where('category_id',$category_id)->orderBy('price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price-desc")
        {
            $jasas = Jasa::whereBetween('price',[$this->min_price,$this->max_price])->where('category_id',$category_id)->orderBy('price','DESC')->paginate($this->pagesize);
        }
        else{
            $jasas = Jasa::whereBetween('price',[$this->min_price,$this->max_price])->where('category_id',$category_id)->paginate($this->pagesize);

        }
        $categories = Category::all();
        $popular_jasas=Jasa::whereBetween('price',[$this->min_price,$this->max_price])->inRandomOrder()->limit(4)->get();
        return view('livewire.category-component',['jasas'=>$jasas,'categories'=>$categories,'category_name'=>$category_name,'popular_jasas'=>$popular_jasas])->layout("layouts.base");
    }
}