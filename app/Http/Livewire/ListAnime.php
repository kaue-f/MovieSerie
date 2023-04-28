<?php

namespace App\Http\Livewire;

use App\Models\anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListAnime extends Component
{

    public function render(Request $request)
    {   
        //dd($request->search_id);
        if($request->search_id){
            $animes = DB::table("animes")->whereRaw('titulo like "%'.$request->search_id.'%" OR genero like "%'.$request->search_id.'%"')->paginate(10);
            
        } else{
            $animes = anime::where('id_user', auth()->user()->id)->orderBy('titulo', 'ASC')->paginate(10);
        }


        return view('livewire.list-anime', compact('animes', ), ['animes' => $animes]);
    }

}
