<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Auth;

class UserProfilComponent extends Component
{
    public function render()
    {
        $users = User::where('id', Auth::user()->id)->get();
        return view('livewire.user.user-profil-component',['users'=>$users])->layout('layouts.base');
    }
}
