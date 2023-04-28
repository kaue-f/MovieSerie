<?php

namespace App\Http\Livewire;

use App\Models\serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ViewEditS extends Component
{
    public function render(Request $request)
    {   
        if($request->search_id){
            $viewEseries = DB::table("series")->whereRaw('titulo like "%'.$request->search_id.'%"')->paginate(10);
            
        } else{
        $viewEseries = serie::where('id_user', auth()->user()->id)->orderBy('titulo', 'ASC')->paginate(10);
        }

        return view('livewire.view-edit-s', compact('viewEseries'),  ['viewEseries' => $viewEseries]);
    }

    public function deleteSerie(string | int $id){
        
        if (!$viewEseries = serie::find($id)){
            return back();
        }
        $viewEseries->delete();

        return redirect()->route('view.edit.serie');
    }
}
