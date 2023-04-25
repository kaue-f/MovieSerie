<?php

namespace App\Http\Livewire;

use App\Models\serie;
use Livewire\Component;

class ViewEditS extends Component
{
    public function render()
    {   
        $viewEseries = serie::where('id_user', auth()->user()->id)->orderBy('titulo', 'ASC')->get();

        return view('livewire.view-edit-s', compact('viewEseries'));
    }
}
