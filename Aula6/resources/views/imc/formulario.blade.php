@extends('layout.app')

@section('title', 'Cálculo do IMC')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Cálculo do IMC</h2>
            <form action="{{ url('/imc/calcular') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                </div>
                <div class="mb-3">
                    <label for="peso" class="form-label">Peso (kg):</label>
                    <input type="number" class="form-control" id="peso" name="peso" step="0.1" required>
                </div>
                <div class="mb-3">
                    <label for="altura" class="form-label">Altura (m):</label>
                    <input type="number" class="form-control" id="altura" name="altura" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary">Calcular</button>
                <a href="{{ url('/') }}" class="btn btn-secondary">Voltar</a>
            </form>
        </div>
    </div>
@endsection
