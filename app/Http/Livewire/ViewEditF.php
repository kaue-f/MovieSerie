<?php

namespace App\Http\Livewire;

use App\Models\filme;
use Livewire\Component;

class ViewEditF extends Component
{
    public function render()
    {   
        $viewEfilme = filme::where('id_user', auth()->user()->id)->orderBy('titulo', 'ASC')->paginate(10);

        return view('livewire.view-edit-f', compact('viewEfilme'),  ['viewEfilme' => $viewEfilme]);
    }

    public function deleteFilme(string | int $id){

        if (!$viewEfilme = filme::find($id)){
            return back();
        }
        $viewEfilme->delete();

        return redirect()->route('view.edit.filme');
    }
}
