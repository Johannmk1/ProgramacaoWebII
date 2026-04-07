<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IMC;

class IMCController extends Controller
{
    public function index() {
        $data['titulo'] = "Aplicação Saúde - Calculo do IMC";
        return view("imc.index", $data);
    }

    public function calcular(Request $request) {
        $imcModel = new IMC();

        $nome = $request->input('nome');
        $peso = $request->input('peso');
        $altura = $request->input('altura');
        $nascimento = $request->input('nascimento');

        $imcValor = $imcModel->calcularValorIMC($peso, $altura);
        $idade = $imcModel->calcularIdade($nascimento);
        $classificacao = $imcModel->getClassificacao($imcValor);

        return view('imc.resultado', [
            'nome' => $nome,
            'idade' => $idade,
            'peso' => $peso,
            'altura' => $altura,
            'imc' => number_format($imcValor, 2),
            'classificacao' => $classificacao
        ]);
    }
}
