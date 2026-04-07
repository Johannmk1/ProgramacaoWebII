@extends('layout.principal')
@section('content')
    <h1>Resultado do Cálculo de Consumo</h1>
    <div style="background-color: #e2f3e5; padding: 20px; border-radius: 5px;">
        <h3>O valor total do gasto será de:</h3>
        <ul>
            <li><strong>{{ $combustivel }}:</strong> R$ {{ $valorTotal }}</li>
        </ul>
    </div>
    <br>
    <a href="{{ url('/') }}">
        <button>Voltar para o Início</button>
    </a>

    <a href="{{ url('/viagem') }}">
        <button>Novo Cálculo</button>
    </a>
@endsection