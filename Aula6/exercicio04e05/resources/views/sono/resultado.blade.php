@extends('layout.principal')
@section('content')
    <h1>Resultado da Qualidade do Sono</h1>
    <p>Idade informada: {{ $idade }} anos</p>
    <p>Horas dormidas: {{ $horas }}h</p>
    <div style="padding: 20px; background: #f0f0f0; border-radius: 8px;">
        <strong>Análise:</strong> {{ $status }}
    </div>
    <br>
    <a href="{{ url('/') }}">
        <button>Voltar para o Início</button>
    </a>

    <a href="{{ url('/sono') }}">
        <button>Novo Cálculo</button>
    </a>
@endsection