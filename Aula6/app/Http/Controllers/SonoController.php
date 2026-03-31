<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sono;

class SonoController extends Controller
{
    public function index()
    {
        return view('sono.formulario');
    }

    public function avaliar(Request $request)
    {
        $nome = $request->input('nome');
        $dataNascimento = $request->input('data_nascimento');
        $horasSono = $request->input('horas_sono');

        $modelSono = new Sono();

        $idade = $modelSono->calcularIdade($dataNascimento);
        $recomendado = $modelSono->horasRecomendadas($idade);
        $avaliacao = $modelSono->avaliarSono($horasSono, $idade);

        $horasMin = $recomendado['min'];
        $horasMax = $recomendado['max'];
        $faixaEtaria = $recomendado['faixa'];

        return view('sono.resultado', compact('nome', 'idade', 'horasSono', 'avaliacao', 'horasMin', 'horasMax', 'faixaEtaria'));
    }
}
