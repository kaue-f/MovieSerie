<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\serie;
use DateTime;
use Illuminate\Http\Request;

class DadosSerie extends Controller
{
    //Controle Serie
    public function dadosSerie(Request $request){

        $dadosSerie = new serie();
    
            $dadosSerie->titulo = $request->titulo;
    
            $dadosSerie->temporada = $request->temporada;
    
            $dadosSerie->episodio = $request->episodio;
    
            $dadosSerie->capa = $request->capa;
    
            $dadosSerie->genero = $request->genero;
    
            $dadosSerie->classificacao = $request->classificacao;
    
            $dadosSerie->sinopse = $request->sinopse;
                
            $duracao = new DateTime("01-01-2023" .$request->duracao);
            $dadosSerie->duracaoEpisodio = $duracao;
    
            $dadosSerie->lancamento = $request->lancamento;
    
            $dadosSerie->finalizou = $request->assistiu;
    
            $dadosSerie->nota = $request->nota;
    
            $dadosSerie->id_user = auth()->user()->id;
            $dadosSerie->save();
            
        return redirect(route('adicionar.serie'));
    }
}
