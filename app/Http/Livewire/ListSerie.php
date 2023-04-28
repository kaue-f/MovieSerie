<?php

namespace App\Http\Livewire;

use App\Models\serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListSerie extends Component
{
    public function render(Request $request)
    {   
        if($request->search_id){
            $series = DB::table("series")->whereRaw('titulo like "%'.$request->search_id.'%" OR genero like "%'.$request->search_id.'%"')->paginate(10);
            
        } else{
        $series = serie::where('id_user', auth()->user()->id)->orderBy('titulo', 'ASC')->paginate(10);
        }

        return view('livewire.list-serie', compact('series'),  ['series' => $series]);
    }
}
