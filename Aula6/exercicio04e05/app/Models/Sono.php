<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sono extends Model
{
    public function avaliarSono($idade, $horas)
    {
        if ($idade <= 0.25) { $min = 14; $max = 17; } // 0-3 meses (0.25 anos)
        elseif ($idade <= 1)    { $min = 12; $max = 15; } // 4-11 meses
        elseif ($idade <= 2)    { $min = 11; $max = 14; } // 1-2 anos
        elseif ($idade <= 5)    { $min = 10; $max = 13; } // 3-5 anos
        elseif ($idade <= 13)   { $min = 9;  $max = 11; } // 6-13 anos
        elseif ($idade <= 17)   { $min = 8;  $max = 10; } // 14-17 anos
        elseif ($idade <= 64)   { $min = 7;  $max = 9;  } // 18-64 anos
        else                    { $min = 7;  $max = 8;  } // 65+ anos

        if ($horas < $min) {
            return "Sono insuficiente. Para sua idade, o ideal é entre $min e $max horas.";
        } elseif ($horas > $max) {
            return "Sono excessivo. Para sua idade, o ideal é entre $min e $max horas.";
        } else {
            return "Qualidade de sono excelente! Você está dentro da meta de $min a $max horas.";
        }
    }
}