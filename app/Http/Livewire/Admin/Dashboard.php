<?php

namespace App\Http\Livewire\Admin;

use App\Models\anime;
use App\Models\filme;
use App\Models\serie;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        abort_unless(auth()->user()->can('view_dashboard'), 403);

        //buscar a capa de cada catalogo por ordem de adicionamento na tabela.
        $capaS = DB::table('users')
        ->join('series', 'series.id_user', '=','users.id' )
        ->select('series.capa AS serie')
        ->where('users.id',"=",auth()->user()->id)
        ->orderBy('series.created_at', 'DESC')
        ->first();
        //dd($selse);

        $capaF = DB::table('users')
        ->join('filmes', 'filmes.id_user', '=','users.id')
        ->select('filmes.capa AS filme')
        ->where('users.id',"=",auth()->user()->id)
        ->orderBy('filmes.created_at', 'DESC')
        ->first();
        //dd($capaF);

        $capaA = DB::table('users')
        ->join('animes', 'animes.id_user', '=','users.id')
        ->select('animes.capa AS anime')
        ->where('users.id',"=",auth()->user()->id)
        ->orderBy('animes.created_at', 'DESC')
        ->first();

        return view('livewire.admin.dashboard', compact('capaS', 'capaF', 'capaA'));
    }

}
