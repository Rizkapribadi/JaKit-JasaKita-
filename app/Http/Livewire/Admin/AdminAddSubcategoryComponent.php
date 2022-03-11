<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Subcategory;
use App\Models\Category;

class AdminAddSubcategoryComponent extends Component
{

    public $name;
    public $slug;
    public $category_id;
    
    public function generateSlug(){

        $this->slug = Str::slug($this->name);
    }

    public function update($fields){

        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories',
            'category_id'=>'required'
        ]);
    }

    public function createSubcategory(){

        $this->validate([

            'name'=>'required',
            'slug'=>'required|unique:categories',
            'category_id'=>'required'
        ]);

        $subcategory= new Subcategory();
        $subcategory->name=$this->name;
        $subcategory->slug=$this->slug;
        $subcategory->category_id=$this->category_id;
        $subcategory->save();
        session()->flash('message','Subcategory has been created successfully!');
    }
    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin.admin-add-subcategory-component',['categories'=>$categories])->layout('layouts.base');
    }
}
