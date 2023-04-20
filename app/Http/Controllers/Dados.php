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

            $dadosFilme->titulo = $request->f_titulo;

            $dadosFilme->capa = $request->f_capa;

            $dadosFilme->genero = $request->f_genero;

            $dadosFilme->classificacao = $request->f_classificacao;

            $dadosFilme->sinopse = $request->f_sinopse;
            
            $duracaoF = new DateTime("01-01-2023" .$request->f_duracao);
            $dadosFilme->duracao = $duracaoF;

            $dadosFilme->lancamento = $request->f_lancamento;

            $dadosFilme->finalizou = ($request->f_assistiu == "Sim");

            $dadosFilme->nota = $request->f_nota;

            $dadosFilme->id_user = auth()->user()->id;
            $dadosFilme->save();
        
        return redirect(route('adicionar.filme'));
    }
}
