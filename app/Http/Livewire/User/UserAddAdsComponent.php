<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Jasa;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads; 
use App\Models\Advertisement;

class UserAddAdsComponent extends Component
{

    use WithFileUploads;
    public $name;
    public $link;
    public $image;
    public $status;
    public $user_id;
    public $jasa_id;
    public $paymentmethod;
    public $day;


    public function deleteAds($ads_id)
    {
        $ads = Advertisement::find($ads_id);
        if($ads->image)
        {
            unlink('assets/images/sliders'.'/'.$ads->image);
        }
        $ads->delete();
        session()->flash('message','Advertisement has been deleted successfully!');
    }
    
    public function mount($jasa_id)
    {
        $this->status = 0;
    }

    public function addAds()
    {
        if($this->paymentmethod == 'cod')
        {
        $ads = new Advertisement();
        $ads->name = $this->name;
        $ads->link = $this->link;

        $imagename = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('sliders', $imagename);

        $ads->image = $imagename;
        $ads->status = $this->status;
        
        $ads->jasa_id = $this->jasa_id;
        $ads->user_id= auth()->id();
        $ads->mode ='cod';
        $ads->day =$this->day;
        $ads->save();
        }
        session()->flash('message', 'Advertisement has been added successfully!');

    }

    public function render()
    {
        $ads= Advertisement::orderBy('created_at','DESC')->whereHas('jasa', function($q){
            $q->where('user_id', auth()->id());})->get();
        return view('livewire.user.user-add-ads-component',['ads'=>$ads])->layout('layouts.base');
    }
}