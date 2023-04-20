<?php

namespace App\Http\Livewire;

use App\Models\filme;
use Livewire\Component;

class ListFilme extends Component
{
    public function render()
    {   
        $filmes = filme::where('id_user', auth()->user()->id)->orderBy('titulo', 'ASC')->get();

        return view('livewire.list-filme', compact('filmes'));
    }
}
