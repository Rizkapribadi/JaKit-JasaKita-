<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Province;
use App\Models\Regency;

class AdminEditProfileComponent extends Component
{
    public $provinces;
    public $regencies;

    public $selectedCategory = null;
    public $selectedProvince = null;
  

    public $name;
    public $email;
    public $address;
    public $phoneNumber;
    public $province_id;
    public $regency_id;
    public $user_id;


    public function mount($user_id)
    {
        $this->provinces = Province::all();
        $this->regencies = collect();

        $user = User::find($user_id);
        $this->name =  $user->name;
        $this->email = $user->email;
        $this->phoneNumber = $user->phoneNumber;
        $this->address = $user->address;
        $this->user_id =  $user->id;
        $this->province_id =  $user->province_id;
        $this->regency_id= $user->regency_id;
    }

    public function updateBiodata()
    {

        $user = User::find($this->user_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phoneNumber = $this->phoneNumber;
        $user->address = $this->address;
        $user->province_id=$this->province_id;
        $user->regency_id=$this->regency_id;
        $user->id= auth()->id();
        $user->save();
        session()->flash('message','Biodata has been updated successfully!');

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
        return view('livewire.admin.admin-edit-profile-component')->layout('layouts.base');
    }
}
