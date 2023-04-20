<?php

namespace App\Http\Livewire;

use App\Models\anime;
use Livewire\Component;

class ListAnime extends Component
{
    public function render()
    {   
        $animes = anime::where('id_user', auth()->user()->id)->orderBy('titulo', 'ASC')->get();

        return view('livewire.list-anime');
    }
}
