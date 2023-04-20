<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\anime;
use DateTime;
use Illuminate\Http\Request;

class DadosAnime extends Controller
{
     //Controle Anime
    public function dadosAnime(Request $request){

        $dadosAnime = new anime();
    
            $dadosAnime->titulo = $request->a_titulo;
    
            $dadosAnime->temporada = $request->a_temporada;
    
            $dadosAnime->episodio = $request->a_episodio;
    
            $dadosAnime->capa = $request->a_capa;
    
            $dadosAnime->genero = $request->a_genero;
    
            $dadosAnime->classificacao = $request->a_classificacao;
    
            $dadosAnime->sinopse = $request->a_sinopse;
                
            $duracaoA = new DateTime("01-01-2023" .$request->a_duracao);
            $dadosAnime->duracaoEpisodio     = $duracaoA;
    
            $dadosAnime->lancamento = $request->a_lancamento;
    
            $dadosAnime->finalizou = ($request->a_assistiu == "Sim");
    
            $dadosAnime->nota = $request->a_nota;
    
            $dadosAnime->id_user = auth()->user()->id;
            $dadosAnime->save();
            
        return redirect(route('adicionar.anime'));
    }
}    
