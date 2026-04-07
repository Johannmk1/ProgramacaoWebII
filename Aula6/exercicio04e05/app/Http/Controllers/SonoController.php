<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sono;

class SonoController extends Controller
{
    public function index() {
        $data['titulo'] = 'Avaliação de Qualidade de Sono';
        return view('sono.index', $data);
    }

    public function avaliar(Request $request) {
        $sonoModel = new Sono();
        
        $idade = $request->input('idade');
        $horas = $request->input('horas');
        
        $resultado = $sonoModel->avaliarSono($idade, $horas);

        return view('sono.resultado', [
            'idade' => $idade,
            'horas' => $horas,
            'status' => $resultado
        ]);
    }
}