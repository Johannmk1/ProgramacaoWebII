<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IMC;
use App\Models\Sono;
use App\Models\Viagem;

class HomeController extends Controller
{
    public function index() {
        $data['titulo'] = "Escolha um dos nossos serviços";
        return view("home", $data);
    }
}
