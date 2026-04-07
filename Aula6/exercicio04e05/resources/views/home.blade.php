@extends('layout.principal')
@section('titulo', $titulo)
@section('content')

<h1 style="text-align: center"> {{$titulo}} </h1>
<br>
<ul>
    {{-- <li>
        <a href="{{ url('/') }}">Home</a>
    </li> --}}
    <li>
        <a href="{{ url('imc') }}">Calcule seu IMC</a>
    </li>
    <li>
        <a href="{{ url('sono') }}">Avalie seu Sono</a>
    </li>
    <li>
        <a href="{{ url('viagem') }}">Calcule seu gasto com combustível durante a Viagem</a>
    </li>
</ul>
@endsection