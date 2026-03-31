@extends('layout.app')

@section('title', 'Avaliação do Sono')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Avaliação das Horas de Sono</h2>
            <form action="{{ url('/sono/avaliar') }}" method="POST">
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
                    <label for="horas_sono" class="form-label">Número médio de horas dormidas por noite:</label>
                    <input type="number" class="form-control" id="horas_sono" name="horas_sono" step="0.5" min="0" max="24" required>
                </div>
                <button type="submit" class="btn btn-success">Avaliar</button>
                <a href="{{ url('/') }}" class="btn btn-secondary">Voltar</a>
            </form>
        </div>
    </div>
@endsection
