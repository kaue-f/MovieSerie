<?php

namespace App\Http\Livewire;

use App\Models\anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ViewEditA extends Component
{
    public function render(Request $request)
    {   
        if($request->search_id){
            $viewEanimes = DB::table("animes")->whereRaw('titulo like "%'.$request->search_id.'%"')->paginate(10);
            
        } else{
        $viewEanimes = anime::where('id_user', auth()->user()->id)->orderBy('titulo', 'ASC')->paginate(10);
        }

        return view('livewire.view-edit-a', compact('viewEanimes'),  ['viewEanimes' => $viewEanimes]);
    }

    public function deleteAnime(string | int $id){
        
        if (!$viewEanimes = anime::find($id)){
            return back();
        }
        $viewEanimes->delete();

        return redirect()->route('view-edit.anime');
    }

}
