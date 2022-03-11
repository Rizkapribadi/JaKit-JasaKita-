<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Advertisement;
use App\Models\Jasa;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads; 

class AdminEditAdsComponent extends Component
{

    use WithFileUploads;
    public $name;
    public $link;
    public $image;
    public $status;
    public $user_id;
    public $jasa_id;
    public $mode;
    public $day;
    public $rstatus;
    public $newimage;
    public $ads_id;

    public function mount($ads_id)
    {
        $ads= Advertisement::find($ads_id);
        $this->name = $ads->name;
        $this->link = $ads->link;
        $this->image = $ads->image;
        $this->status = $ads->status;
        $this->ads_id = $ads->id;
        $this->jasa_id = $ads->jasa_id;
        $this->user_id= $ads->user_id;
        $this->mode= $ads->mode;
        $this->day= $ads->day;
        $this->rstatus= $ads->rstatus;
    }

    public function updateAds()
    {
        $ads= Advertisement::find($this->ads_id);
        $ads->name = $this->name;
        $ads->link = $this->link;
        if($this->newimage)
        {
            $imagename = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('sliders', $imagename);
            $ads->image = $imagename;
        }
        $ads->status = $this->status;
        $ads->jasa_id = $this->jasa_id;
        $ads->user_id= $this->user_id;
        $ads->mode = $this->mode;
        $ads->rstatus = $this->rstatus;
        $ads->day = $this->day;
        $ads->save();
        session()->flash('message', 'Ads has been updated successfully');

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-ads-component')->layout('layouts.base');
    }
}
