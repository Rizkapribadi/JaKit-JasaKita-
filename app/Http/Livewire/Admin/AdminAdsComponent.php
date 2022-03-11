<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Advertisement;
use App\Models\User;
use App\Models\Jasa;

class AdminAdsComponent extends Component
{
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

    public function render()
    {
        $ads=Advertisement::all();
        return view('livewire.admin.admin-ads-component',['ads'=>$ads])->layout('layouts.base');
    }
}