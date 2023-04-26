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
    
            $dadosAnime->titulo = $request->titulo;
    
            $dadosAnime->temporada = $request->temporada;
    
            $dadosAnime->episodio = $request->episodio;
    
            $dadosAnime->capa = $request->capa;
    
            $dadosAnime->genero = $request->genero;
    
            $dadosAnime->classificacao = $request->classificacao;
    
            $dadosAnime->sinopse = $request->sinopse;
                
            $duracao = new DateTime("01-01-2023" .$request->duracao);
            $dadosAnime->duracaoEpisodio = $duracao;
    
            $dadosAnime->lancamento = $request->lancamento;
    
            $dadosAnime->finalizou = $request->assistiu;
    
            $dadosAnime->nota = $request->nota;
    
            $dadosAnime->id_user = auth()->user()->id;
            $dadosAnime->save();
            
        return redirect(route('adicionar.anime'));
    }
}    
