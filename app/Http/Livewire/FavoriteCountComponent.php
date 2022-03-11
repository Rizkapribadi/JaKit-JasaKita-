<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FavoriteCountComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];

    public function render()
    {
        return view('livewire.favorite-count-component');
    }

}
