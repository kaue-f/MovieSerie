<?php

namespace App\Http\Livewire;

use App\Models\serie;
use Livewire\Component;

class ViewSerie extends Component
{
    public function render()
    {
        return view('livewire.view-serie');
    }

    public function viewserie($id){
        $viewserie = serie::find($id);

        return view('livewire.view-serie', compact('viewserie'));
    }
}
