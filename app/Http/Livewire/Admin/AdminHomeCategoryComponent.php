<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;

class AdminHomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $numberofjasas;

    public function mount(){

        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',',$category->sel_categories);
        $this->numberofjasas = $category->no_of_jasa;
    }

    public function updateHomeCategory(){

        $category = HomeCategory::find(1);
        $category->sel_categories = implode(',',$this->selected_categories);
        $category->no_of_jasa = $this->numberofjasas;
        $category->save();
        session()->flash('message','HomeCategory has been updated succesfully');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
