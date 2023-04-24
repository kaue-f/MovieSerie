<?php

namespace App\Http\Livewire;

use App\Models\anime;
use Livewire\Component;

class ViewAnime extends Component
{
    public function render()
    {
        return view('livewire.view-anime');
    }

    public function viewanime($id){
        $viewanime = anime::find($id);

        return view('livewire.view-anime', compact('viewanime'));
    }
}
