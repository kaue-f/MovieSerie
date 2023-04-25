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

    public function updateFilme(Request $request, filme $editfilme){


        //$editfilme->fill($request->all())->save();

//        $editfilme = new filme();
        
        filme::where('id',)

        $editfilme->fill($request->all())->save();


        return redirect()->route('catalogo.filmes');
        
    }
}
