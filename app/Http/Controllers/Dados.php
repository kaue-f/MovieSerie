<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\filme;
use DateTime;
use Illuminate\Http\Request;

class Dados extends Controller
{
    //Controle filme
    public function dadosFilme(Request $request){

        $dadosFilme = new filme();

            $dadosFilme->titulo = $request->titulo;

            $dadosFilme->capa = $request->capa;

            $dadosFilme->genero = $request->genero;

            $dadosFilme->classificacao = $request->classificacao;

            $dadosFilme->sinopse = $request->sinopse;
            
            $duracao = new DateTime("01-01-2023" .$request->duracao);
            $dadosFilme->duracao = $duracao;

            $dadosFilme->lancamento = $request->lancamento;

            $dadosFilme->finalizou = $request->finalizou;

            $dadosFilme->nota = $request->nota;

            $dadosFilme->id_user = auth()->user()->id;
            $dadosFilme->save();
        
        return redirect(route('adicionar.filme'));
    }
}
