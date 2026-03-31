<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imc;

class ImcController extends Controller
{
    public function index()
    {
        return view('imc.formulario');
    }

    public function calcular(Request $request)
    {
        $nome = $request->input('nome');
        $dataNascimento = $request->input('data_nascimento');
        $peso = $request->input('peso');
        $altura = $request->input('altura');

        $modelImc = new Imc();

        $idade = $modelImc->calcularIdade($dataNascimento);
        $imc = $modelImc->calcularImc($peso, $altura);
        $classificacao = $modelImc->classificarImc($imc);

        return view('imc.resultado', compact('nome', 'idade', 'peso', 'altura', 'imc', 'classificacao'));
    }
}
