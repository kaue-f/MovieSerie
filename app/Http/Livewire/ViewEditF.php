<?php

namespace App\Http\Livewire;

use App\Models\filme;
use Livewire\Component;

class ViewEditF extends Component
{
    public function render()
    {   
        $viewEfilme = filme::where('id_user', auth()->user()->id)->orderBy('titulo', 'ASC')->get();

        return view('livewire.view-edit-f', compact('viewEfilme'));
    }
}
