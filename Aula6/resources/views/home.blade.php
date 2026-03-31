@extends('layout.app')

@section('title', 'Saúde - Início')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1>Bem-vindo ao Sistema de Saúde</h1>
            <p class="lead">Escolha uma das opções abaixo:</p>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Cálculo do IMC</h5>
                    <p class="card-text">Calcule seu Índice de Massa Corporal e descubra sua classificação.</p>
                    <a href="{{ url('/imc') }}" class="btn btn-primary">Calcular IMC</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Horas de Sono</h5>
                    <p class="card-text">Avalie a qualidade do seu sono conforme sua faixa etária.</p>
                    <a href="{{ url('/sono') }}" class="btn btn-success">Avaliar Sono</a>
                </div>
            </div>
        </div>
    </div>
@endsection
