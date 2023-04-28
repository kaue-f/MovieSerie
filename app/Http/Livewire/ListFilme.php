<?php

namespace App\Http\Livewire;

use App\Models\filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ListFilme extends Component
{   
    
    public function render(Request $request)
    {   
        if($request->search_id){
            $filmes = DB::table("filmes")->whereRaw('titulo like "%'.$request->search_id.'%" OR genero like "%'.$request->search_id.'%"')->paginate(10);
            
        } else{
        $filmes = filme::where('id_user', auth()->user()->id)->orderBy('titulo', 'ASC')->paginate(10);
        }

        return view('livewire.list-filme', compact('filmes'), ['filmes' => $filmes]);
    }

}
