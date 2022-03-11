<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Jasa;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class UserAddJasaComponent extends Component 
{

    use WithFileUploads;
    public $categories;
    public $subcategories;
    public $provinces;
    public $regencies;

    public $selectedCategory = null;
    public $selectedProvince = null;

    public $name;
    public $slug;
    public $address;
    public $description;
    public $price;
    public $unit;
    public $sale_price;
    public $status;
    public $featured;
    public $quantity;
    public $image;
    public $user_id;
    public $category_id;
    public $subcategory_id;
    public $province_id;
    public $regency_id;
    public $location_link;
    public $images;
    

    public function mount()
    {
        $this->status= 'tersedia';
        $this->quantity= 1000000;

        $this->categories = Category::all();
        $this->subcategories = collect();

        $this->provinces = Province::all();
        $this->regencies = collect();

      
    }


    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function update($fields){

        $this->validateOnly($fields,[
            'name'=> 'required',
             'slug'=> 'required|unique:jasas',
             'address'=> 'required',
             'description'=> 'required',
             'price'=> 'required|numeric',
             'status'=> 'required',
             'image'=> 'required|mimes:jpeg,png,jpg|max:1024',
             'category_id'=> 'required',
             'province_id'=> 'required'
        ]);
    }

    public function addJasa()
    {
        $this->validate([

             'name'=> 'required',
             'slug'=> 'required|unique:jasas',
             'address'=> 'required',
             'description'=> 'required',
             'price'=> 'required|numeric',
             'status'=> 'required',
             'image'=> 'required|mimes:jpeg,png,jpg|max:1024',
             'category_id'=> 'required',
             'province_id'=> 'required'
        ]);
        $jasa = new Jasa();
        $jasa->name = $this->name;
        $jasa->slug = $this->slug;
        $jasa->address = $this->address;
        $jasa->description = $this->description;
        $jasa->price = $this->price;
        $jasa->unit = $this->unit;
        $jasa->sale_price = $this->sale_price;
        $jasa->status = $this->status;
        $jasa->quantity = $this->quantity;

    
        $imageName= Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('products',$imageName);
        $jasa->image = $imageName;

        if($this->images)
        {
            $imagesname = '';
            foreach($this->images as $key=>$image)
            {
                $imgName= Carbon::now()->timestamp. $key. '.' . $image->extension();
                $image->storeAs('products',$imgName);
                $imagesname = $imagesname . ',' . $imgName;
            }
            $jasa->images = $imagesname; 
        }

        $jasa->user_id= auth()->id();
        $jasa->category_id = $this->category_id;
        $jasa->subcategory_id = $this->subcategory_id;
        $jasa->province_id = $this->province_id;
        $jasa->regency_id = $this->regency_id;
        $jasa->location_link = $this->location_link;
        $jasa->save();
        session()->flash('message','Jasa has been created successfully!');
        

    }

    public function updatedSelectedCategory($category)
    {
        if(!is_null($category)){
            $this->subcategories=Subcategory::where('category_id',$category)->get();
        }
        
    }

    public function updatedSelectedProvince($province)
    {
        if(!is_null($province)){
            $this->regencies=Regency::where('province_id',$province)->get();
        }

    }

    public function render()
    {
        
        return view('livewire.user.user-add-jasa-component')->layout('layouts.base');
    }

   
   
}
