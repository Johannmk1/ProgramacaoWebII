<?php

namespace App\Models;

class Imc
{
    public function calcularIdade($dataNascimento)
    {
        $nascimento = new \DateTime($dataNascimento);
        $hoje = new \DateTime();
        $idade = $hoje->diff($nascimento)->y;
        return $idade;
    }

    public function calcularImc($peso, $altura)
    {
        if ($altura <= 0) {
            return 0;
        }
        return $peso / ($altura * $altura);
    }

    public function classificarImc($imc)
    {
        if ($imc < 18.5) {
            return 'Abaixo do peso';
        } elseif ($imc < 25) {
            return 'Peso normal';
        } elseif ($imc < 30) {
            return 'Acima do peso (sobrepeso)';
        } elseif ($imc < 35) {
            return 'Obesidade I';
        } elseif ($imc < 40) {
            return 'Obesidade II';
        } else {
            return 'Obesidade III';
        }
    }
}
