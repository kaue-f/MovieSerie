<?php

namespace App\Http\Livewire;

use App\Models\anime;
use Livewire\Component;

class ViewEditA extends Component
{
    public function render()
    {
        $viewEanimes = anime::where('id_user', auth()->user()->id)->orderBy('titulo', 'ASC')->get();

        return view('livewire.view-edit-a', compact('viewEanimes'));
    }
}
