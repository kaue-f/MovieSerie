<?php

namespace App\Http\Livewire;

use App\Models\filme;
use Illuminate\Http\Request;
use Livewire\Component;

class EditFilme extends Component
{
    public function render()
    {
        return view('livewire.edit-filme');
    }

    public function editFilme($id){

        $editfilme = filme::find($id);

        return view('livewire.edit-filme', compact('editfilme'));
    }

    public function updateFilme(Request $request, filme $editfilme, string $id){

        if (!$editfilme = $editfilme->find($id)){
            return back();
        }

        $editfilme->update($request->only([
            'capa', 'genero', 'classificacao',
            'finalizou', 'nota'
        ]));

        return redirect()->route('view.edit.filme');
    }
}
