<?php

namespace App\Models;

class Sono
{
    public function calcularIdade($dataNascimento)
    {
        $nascimento = new \DateTime($dataNascimento);
        $hoje = new \DateTime();
        $idade = $hoje->diff($nascimento)->y;
        return $idade;
    }

    public function horasRecomendadas($idade)
    {
        if ($idade <= 2) {
            return ['min' => 11, 'max' => 14, 'faixa' => 'Criança (0-2 anos)'];
        } elseif ($idade <= 5) {
            return ['min' => 10, 'max' => 13, 'faixa' => 'Pré-escolar (3-5 anos)'];
        } elseif ($idade <= 13) {
            return ['min' => 9, 'max' => 11, 'faixa' => 'Escolar (6-13 anos)'];
        } elseif ($idade <= 17) {
            return ['min' => 8, 'max' => 10, 'faixa' => 'Adolescente (14-17 anos)'];
        } elseif ($idade <= 64) {
            return ['min' => 7, 'max' => 9, 'faixa' => 'Adulto (18-64 anos)'];
        } else {
            return ['min' => 7, 'max' => 8, 'faixa' => 'Idoso (65+ anos)'];
        }
    }

    public function avaliarSono($horas, $idade)
    {
        $recomendado = $this->horasRecomendadas($idade);
        if ($horas < $recomendado['min']) {
            return 'Sono insuficiente';
        } elseif ($horas > $recomendado['max']) {
            return 'Sono em excesso';
        } else {
            return 'Sono adequado';
        }
    }
}
