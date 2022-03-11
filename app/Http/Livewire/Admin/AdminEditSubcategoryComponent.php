<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Subcategory;

class AdminEditSubcategoryComponent extends Component
{
    public $subcategory_slug;
    public $subcategory_id;
    public $name;
    public $slug;
    public $category_id;

    public function mount($subcategory_slug)
    {
        $this->$subcategory_slug = $subcategory_slug;
        $subcategory = Subcategory::where('slug', $subcategory_slug)->first();
        $this->subcategory_id = $subcategory->id;
        $this->name = $subcategory->name;
        $this->slug = $subcategory->slug;
        $this->category_id = $subcategory->category_id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);

    }
    public function update($fields){

        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories',
            'category_id'=>'required'
        ]);
    }
    public function updateSubcategory()
    {
        $this->validate([

            'name'=>'required',
            'slug'=>'required|unique:categories',
            'category_id'=>'required'
        ]);
        $subcategory = Subcategory::find($this->subcategory_id);
        $subcategory->name = $this->name;
        $subcategory->slug = $this->slug;
        $subcategory->category_id = $this->category_id;
        $subcategory->save();
        session()->flash('message','Subcategory has been updated successfully!');
    }
    public function render()
    {
        $categories=Category::all();
        $subcategory = Subcategory::find($this->subcategory_id);
        return view('livewire.admin.admin-edit-subcategory-component',['categories'=>$categories,'subcategory'=>$subcategory])->layout('layouts.base');
    }
}
