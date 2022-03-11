<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Auth;

class AdminProfileComponent extends Component
{
    public function render()
    {
        $users = User::where('id', Auth::user()->id)->get();
        return view('livewire.admin.admin-profile-component',['users'=>$users])->layout('layouts.base');
    }
}
