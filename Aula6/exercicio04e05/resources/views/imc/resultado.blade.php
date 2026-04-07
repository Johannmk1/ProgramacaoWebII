@extends('layout.principal')

@section('content')
    <h1>Resultado da análise IMC</h1>
    <h2>{{ $nome }}</h2>
    <p><strong>Idade:</strong> {{ $idade }}</p>
    <p><strong>Peso:</strong> {{ $peso }}g</p>
    <p><strong>Altura:</strong> {{ $altura }}m</p>
    <p><strong>IMC:</strong> {{ $imc }} - {{ $classificacao }}</p>

    <br>
    <a href="{{ url('/') }}">
        <button>Voltar para o Início</button>
    </a>

    <a href="{{ url('/imc') }}">
        <button>Novo Cálculo</button>
    </a>
@endsection