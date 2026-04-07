<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class IMC extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'data_nascimento', 'peso', 'altura'];


    //Lógica para calcular a idade
    public function calcularIdade($dataNascimento)
    {
        return Carbon::parse($dataNascimento)->age;
    }

    //Lógica para calcular o IMC
    public function calcularValorIMC($peso, $altura)
    {
        return $peso / ($altura * $altura);
    }

    //Lógica para a classificação
    public function getClassificacao($imc)
    {
        if ($imc < 18.5) return "Abaixo do peso";
        if ($imc < 25) return "Peso normal";
        if ($imc < 30) return "Acima do peso (sobrepeso)";
        if ($imc < 35) return "Obesidade I";
        if ($imc < 40) return "Obesidade II";
        return "Obesidade III";
    }
}
