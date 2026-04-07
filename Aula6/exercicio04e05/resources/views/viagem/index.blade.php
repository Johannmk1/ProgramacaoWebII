@extends('layout.principal')
@section('content')
    <h1>{{ $titulo }}</h1>
    <form action="{{ url('/viagem/calcular') }}" method="POST">
        @csrf
        <label>Combustível:</label>
        <select name="combustivel">
            <option value="Gasolina">Gasolina</option>
            <option value="Álcool">Álcool</option>
            <option value="Diesel">Diesel</option>
        </select><br><br>

        <label>Valor (R$):</label>
        <input type="number" step="0.01" name="valor" required><br>

        <label>Distância em km:</label>
        <input type="number" name="distancia" required><br>

        <label>Consumo do veículo (km/l):</label>
        <input type="number" step="0.1" name="consumo" required><br>

        <button type="submit">Calcular</button><br>
        <a href="{{ url('/') }}">Voltar para Home</a>
    </form>
@endsection