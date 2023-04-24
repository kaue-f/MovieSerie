<?php

namespace App\Http\Livewire;

use App\Models\filme;
use Livewire\Component;

class ViewFilme extends Component
{
    public function render()
    {
        return view('livewire.view-filme');
    }

    public function viewfilme($id){

        $viewfilme = filme::find($id);

        //dd($viewfilme);

        return view('livewire.view-filme', compact('viewfilme'));
    }
}
