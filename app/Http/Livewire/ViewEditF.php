<?php

namespace App\Http\Livewire;

use App\Models\filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ViewEditF extends Component
{
    public function render(Request $request)
    {   
        if($request->search_id){
            $viewEfilme = DB::table("filmes")->whereRaw('titulo like "%'.$request->search_id.'%"')->paginate(10);
            
        } else{
        $viewEfilme = filme::where('id_user', auth()->user()->id)->orderBy('titulo', 'ASC')->paginate(10);
        }

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
