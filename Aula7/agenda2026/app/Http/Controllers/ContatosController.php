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
        return view('contatos.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255',
        'email' =>'required|email|max:255',
        'telefone' => 'required|string|max:20',
        ]);
        $contato = new Contato();
        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->cidade = $request->input('cidade');
        $contato->estado = $request->input('estado');
        if ($contato->save()) {
            return redirect()->route('contatos.index')->with('success', 'Contato criado com sucesso.');
        } else {
            return redirect()->route('contatos.create')->with('error', 'Erro ao criar contato. Tente novamente.');
        }
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