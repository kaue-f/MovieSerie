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
    
            $dadosSerie->titulo = $request->s_titulo;
    
            $dadosSerie->temporada = $request->s_temporada;
    
            $dadosSerie->episodio = $request->s_episodio;
    
            $dadosSerie->capa = $request->s_capa;
    
            $dadosSerie->genero = $request->s_genero;
    
            $dadosSerie->classificacao = $request->s_classificacao;
    
            $dadosSerie->sinopse = $request->s_sinopse;
                
            $duracaoS = new DateTime("01-01-2023" .$request->s_duracao);
            $dadosSerie->duracaoEpisodio = $duracaoS;
    
            $dadosSerie->lancamento = $request->s_lancamento;
    
            $dadosSerie->finalizou = $request->s_assistiu;
    
            $dadosSerie->nota = $request->s_nota;
    
            $dadosSerie->id_user = auth()->user()->id;
            $dadosSerie->save();
            
        return redirect(route('adicionar.serie'));
    }
}
