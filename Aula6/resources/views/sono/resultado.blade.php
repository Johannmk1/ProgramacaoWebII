@extends('layout.app')

@section('title', 'Resultado da Avaliação do Sono')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Resultado da Avaliação do Sono</h2>
            <div class="alert alert-info">
                <p><?php echo $nome ?>, você tem <?php echo $idade ?> anos (<?php echo $faixaEtaria ?>)
                e dorme em média <?php echo number_format($horasSono, 1) ?> horas por noite.</p>
                <p>A recomendação para sua faixa etária é de <strong><?php echo $horasMin ?> a <?php echo $horasMax ?> horas</strong> por noite.</p>
                <p>Avaliação: <strong>"<?php echo $avaliacao ?>"</strong>.</p>
            </div>

            <h4>Recomendação de Horas de Sono por Faixa Etária</h4>
            <table class="table table-bordered">
                <thead class="table-success">
                    <tr>
                        <th>Faixa Etária</th>
                        <th>Horas Recomendadas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="<?php echo $idade <= 2 ? 'table-warning' : '' ?>">
                        <td>Criança (0-2 anos)</td>
                        <td>11 a 14 horas</td>
                    </tr>
                    <tr class="<?php echo ($idade >= 3 && $idade <= 5) ? 'table-warning' : '' ?>">
                        <td>Pré-escolar (3-5 anos)</td>
                        <td>10 a 13 horas</td>
                    </tr>
                    <tr class="<?php echo ($idade >= 6 && $idade <= 13) ? 'table-warning' : '' ?>">
                        <td>Escolar (6-13 anos)</td>
                        <td>9 a 11 horas</td>
                    </tr>
                    <tr class="<?php echo ($idade >= 14 && $idade <= 17) ? 'table-warning' : '' ?>">
                        <td>Adolescente (14-17 anos)</td>
                        <td>8 a 10 horas</td>
                    </tr>
                    <tr class="<?php echo ($idade >= 18 && $idade <= 64) ? 'table-warning' : '' ?>">
                        <td>Adulto (18-64 anos)</td>
                        <td>7 a 9 horas</td>
                    </tr>
                    <tr class="<?php echo $idade >= 65 ? 'table-warning' : '' ?>">
                        <td>Idoso (65+ anos)</td>
                        <td>7 a 8 horas</td>
                    </tr>
                </tbody>
            </table>

            <a href="{{ url('/sono') }}" class="btn btn-success">Avaliar Novamente</a>
            <a href="{{ url('/') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
@endsection
