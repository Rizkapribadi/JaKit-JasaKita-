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

class UserEditJasaComponent extends Component
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
    public $quantity;
    public $image;
    public $user_id;
    public $category_id;
    public $subcategory_id;
    public $province_id;
    public $regency_id;
    public $location_link;
    public $newimage;
    public $jasa_id;

    public $images;
    public $newimages;
    
    
    public function mount($jasa_slug){
    
      
        $jasa = Jasa::where('slug',$jasa_slug)->first();
        $this->categories = Category::all();
        $this->subcategories = collect();

        $this->provinces = Province::all();
        $this->regencies = collect();
        
        $this->name= $jasa->name;
        $this->slug= $jasa->slug;
        $this->address= $jasa->address;
        $this->description= $jasa->description;
        $this->price= $jasa->price;
        $this->unit= $jasa->unit;
        $this->sale_price= $jasa->sale_price;
        $this->status= $jasa->status;
        $this->quantity= $jasa->quantity;
        $this->image= $jasa->image;
        $this->images= explode(",",$jasa->images);
        $this->user_id= $jasa->user_id;
        $this->category_id= $jasa->category_id;
        $this->subcategory_id= $jasa->subcategory_id;
        $this->province_id= $jasa->province_id;
        $this->regency_id= $jasa->regency_id;
        $this->location_link= $jasa->location_link;
        $this->jasa_id= $jasa->id;
    }

    public function generateSlug(){

        $this->slug=Str::slug($this->name,'-');

    }

    public function updateJasa(){

        $jasa= Jasa::find($this->jasa_id);
        $jasa->name = $this->name;
        $jasa->slug = $this->slug;
        $jasa->address = $this->address;
        $jasa->description = $this->description;
        $jasa->price = $this->price;
        $jasa->unit = $this->unit;
        $jasa->sale_price = $this->sale_price;
        $jasa->status = $this->status;
       
        $jasa->quantity = $this->quantity;

        if($this->newimage)
        {
            unlink('assets/images/products'.'/'.$jasa->image);
            $imageName= Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('products',$imageName);
            $jasa->image = $imageName;

        }

        if($this->newimages)
        {
            if($jasa->images)
            {
                $images= explode(",",$jasa->images);
                foreach($images as $image)
                {
                    if($image)
                    {
                        unlink('assets/images/products'.'/'.$image);
                    }
                }
            }

            $imagesname='';
            foreach($this->newimages as $key=>$image)
            {
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
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
        session()->flash('message','Jasa has been updated successfully!');
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
       
        return view('livewire.user.user-edit-jasa-component')->layout('layouts.base');
    }
}
