<?php

namespace App\Http\Livewire;

use App\Models\anime;
use Illuminate\Http\Request;
use Livewire\Component;

class EditAnime extends Component
{
    public function render()
    {
        return view('livewire.edit-anime');
    }

    public function editAnime($id){

        $editanime = anime::find($id);

        return view('livewire.edit-anime', compact('editanime'));
    }

    public function updateAnime(Request $request, anime $editanime, string $id){

        if (!$editanime = $editanime->find($id)){
            return back();
        }

        $editanime->update($request->only([
            'temporada', 'episodio', 'capa',
            'genero', 'classificacao', 'finalizou',
            'nota'
        ]));

        return redirect()->route('view.edit.anime');
    }
}
