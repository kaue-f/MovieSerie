<?php

namespace App\Http\Livewire;

use App\Models\filme;
use Livewire\Component;
use Livewire\WithPagination;

class ListFilme extends Component
{   
    

    public function render()
    {   
        $filmes = filme::where('id_user', auth()->user()->id)->orderBy('titulo', 'ASC')->paginate(10);

        return view('livewire.list-filme', compact('filmes'), ['filmes' => $filmes]);
    }

}
