<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viagem;

class ViagemController extends Controller
{
    public function index() {
        $data['titulo'] = 'Cálculo de Consumo de Combustível';
        return view('viagem.index', $data);
    }

    public function calcular(Request $request) {
        $viagemModel = new Viagem();

        $combustivel = $request->input('combustivel');
        $valor = $request->input('valor');
        $distancia = $request->input('distancia');
        $consumo = $request->input('consumo');

        $resultado = $viagemModel->calcularGasto($valor, $distancia, $consumo);

        return view('viagem.resultado', [
            'combustivel' => $combustivel,
            'valorTotal' => $resultado
        ]);
    }
}