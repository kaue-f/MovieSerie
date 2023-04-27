<?php

namespace App\Http\Livewire;

use App\Models\serie;
use Illuminate\Http\Request;
use Livewire\Component;

class EditSerie extends Component
{
    public function render()
    {
        return view('livewire.edit-serie');
    }

    public function editSerie($id){

        $editserie = serie::find($id);

        return view('livewire.edit-serie', compact('editserie'));
    }

    public function updateSerie(Request $request, serie $editserie, string $id){

        if (!$editserie = $editserie->find($id)){
            return back();
        }

        $editserie->update($request->only([
            'temporada', 'episodio', 'capa',
            'genero', 'classificacao', 'finalizou',
            'nota'
        ]));

        return redirect()->route('view.edit.serie');
    }
}
