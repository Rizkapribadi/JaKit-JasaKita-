<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Jasa;
use Livewire\WithPagination;

class AdminJasaComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $jasas = Jasa::paginate(10);
        return view('livewire.admin.admin-jasa-component',['jasas'=>$jasas])->layout('layouts.base');
    }
}
