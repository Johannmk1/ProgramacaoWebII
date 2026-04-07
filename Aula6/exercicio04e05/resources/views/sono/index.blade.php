@extends('layout.principal')
@section('content')
    <h1>{{ $titulo }}</h1>
    <form action="{{ url('/sono/avaliar') }}" method="POST">
        @csrf
        <label>Sua Idade:</label>
        <input type="number" name="idade" required><br>
        
        <label>Média de horas dormidas:</label>
        <input type="number" step="0.5" name="horas" required><br>
        
        <button type="submit">Avaliar Sono</button>
    </form>
    <br>
    <a href="{{ url('/') }}">Voltar para Home</a>
@endsection