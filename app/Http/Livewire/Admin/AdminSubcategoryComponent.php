<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Subcategory;
use Livewire\WithPagination;
use App\Models\Category;


class AdminSubcategoryComponent extends Component
{

    use WithPagination;

    public function deleteSubcategory($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        session()->flash('message','subcategory has been deleted successfully!');

    }
    public function render()
    {
        $subcategories = Subcategory::paginate(8);
        return view('livewire.admin.admin-subcategory-component',['subcategories'=>$subcategories])->layout('layouts.base');
    }
}
