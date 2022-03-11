<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Jasa;
use Livewire\WithPagination;
use Auth;
use App\Models\User;

class UserJasaComponent extends Component
{
    use WithPagination;
   
    public function deleteJasa($id){

        $jasa= Jasa::find($id);
        if($jasa->image)
        {
            unlink('assets/images/products'.'/'.$jasa->image);
        }
        if($jasa->images)
        {
            $images = explode(",",$jasa->images);
            foreach($images as $image)
            {
                if($image){
                unlink('assets/images/products'.'/'.$image);
                }
            }
        }
        $jasa->delete();
        session()->flash('message','Jasa has been deleted successfully');
    }
    public function render()
    {
        $jasas = Jasa::where('user_id', Auth::user()->id)->orderBy('id','DESC')->with('user')->paginate(5);
        return view('livewire.user.user-jasa-component',['jasas'=>$jasas])->layout('layouts.base');
    }
}
