@extends('layout.app')

@section('title', 'Resultado do IMC')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Resultado do IMC</h2>
            <div class="alert alert-info">
                <p><?php echo $nome ?>, você tem <?php echo $idade ?> anos, sua altura é <?php echo number_format($altura, 2) ?>m,
                seu peso é <?php echo number_format($peso, 1) ?>kg e seu IMC é: <?php echo number_format($imc, 2) ?>.</p>
                <p>Pelo cálculo do IMC você está classificado como <strong>"<?php echo $classificacao ?>"</strong>.</p>
            </div>

            <h4>Tabela de Classificação do IMC</h4>
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>IMC</th>
                        <th>Classificação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="<?php echo $imc < 18.5 ? 'table-warning' : '' ?>">
                        <td>Menor do que 18,5</td>
                        <td>Abaixo do peso</td>
                    </tr>
                    <tr class="<?php echo ($imc >= 18.5 && $imc < 25) ? 'table-success' : '' ?>">
                        <td>Entre 18,5 e 24,9</td>
                        <td>Peso normal</td>
                    </tr>
                    <tr class="<?php echo ($imc >= 25 && $imc < 30) ? 'table-warning' : '' ?>">
                        <td>Entre 25 e 29,9</td>
                        <td>Acima do peso (sobrepeso)</td>
                    </tr>
                    <tr class="<?php echo ($imc >= 30 && $imc < 35) ? 'table-danger' : '' ?>">
                        <td>Entre 30 e 34,9</td>
                        <td>Obesidade I</td>
                    </tr>
                    <tr class="<?php echo ($imc >= 35 && $imc < 40) ? 'table-danger' : '' ?>">
                        <td>Entre 35 e 39,9</td>
                        <td>Obesidade II</td>
                    </tr>
                    <tr class="<?php echo $imc >= 40 ? 'table-danger' : '' ?>">
                        <td>Maior do que 40</td>
                        <td>Obesidade III</td>
                    </tr>
                </tbody>
            </table>

            <a href="{{ url('/imc') }}" class="btn btn-primary">Calcular Novamente</a>
            <a href="{{ url('/') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
@endsection
