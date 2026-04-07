<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    public function calcularGasto($valorCombustivel, $distancia, $consumoVeiculo)
    {
        if ($consumoVeiculo <= 0) return 0;
        
        $total = ($distancia / $consumoVeiculo) * $valorCombustivel;
        return number_format($total, 2, ',', '.');
    }
}