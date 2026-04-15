<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class ContatosController extends Controller
{
    public function index()
    {
        $contatos = Contato::all();
        return view('contatos.index', compact('contatos'));

    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(string $id)
    {
         $contato = Contato::findOrFail($id);
        return view('contatos.show', compact('contato'));
    }

    public function edit(string $id)
    {
      
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
       
    }
}