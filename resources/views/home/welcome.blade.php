@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <title>Portal de Vagas</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1 class="titulo">PORTAL</h1>
            <h2 class="subtitulo">de Vagas</h2>
            <img id="logo" class="logo" src="{{ asset('images/logo.svg') }}" alt="Logo">
            <p class="descricao">
                Está procurando um emprego novo? Já criou a sua conta? Se não, crie sua conta no nosso menu Register ao topo do site e depois pode curtir a lista de vagas no menu abaixo :)
            </p>
            <a href="{{ route('vagas.index') }}" class="menu">
                <i class="fas fa-arrow-right"></i>LISTA DE VAGAS
            </a>
        </div>
    </body>
</html>
@endsection


