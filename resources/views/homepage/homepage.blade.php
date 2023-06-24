@extends('nav_bar/nav_bar')

@section('title', 'Home')

@section('content')
<link rel="stylesheet" href="{{asset('css/homepage/homepage.css')}}">
    <div class="container">
        <h1>Bem-vindo à To Do List {{$nomeMembro->nome}}!</h1><br>
        <a href="membros/create">Cadastro de Membros</a>
        <a href="tarefas">Lista de Tarefas</a>
    </div>
@endsection
