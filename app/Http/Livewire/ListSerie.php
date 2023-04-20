<?php

namespace App\Http\Livewire;

use App\Models\serie;
use Livewire\Component;

class ListSerie extends Component
{
    public function render()
    {   
        $series = serie::where('id_user', auth()->user()->id)->orderBy('titulo', 'ASC')->get();

        return view('livewire.list-serie');
    }
}