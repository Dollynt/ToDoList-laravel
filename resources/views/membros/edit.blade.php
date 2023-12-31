@extends('nav_bar/nav_bar')

@section('title', 'Edição de Tarefa')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/membros/membros_edit.css') }}">
    @if ($membro->id == $sessionId)
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h1 id="cadastro">Edição de Membro</h1>
        <div id="form">
            <form method="POST" action="/membros/{{$membro->id}}" id="edit-form">
                @csrf
                @method('PUT')
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" class="@error('nome') is-invalid @enderror" name="nome" value="{{$membro->nome}}" required>
                    <!--mensagem de erro de validação-->
                    @error('nome')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{$membro->email}}" required>
                    <!--mensagem de erro de validação-->
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="senha">Senha:</label>
                    <input type="password" class="@error('senha') is-invalid @enderror" name="senha">
                    <!--mensagem de erro de validação-->
                    @error('senha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" id="button_submit">Salvar</button>
            </form>
            <form method="POST" action="/membros/{{$membro->id}}" id="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">Excluir</button>
            </form>
        </div>
    @else
        <h1 id="cadastro">Visualização de Membro</h1>
        <div id="form">
            <form method="POST" action="/membros/{{$membro->id}}" id="edit-form">
                @csrf
                @method('PUT')
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" class="@error('nome') is-invalid @enderror" name="nome" value="{{$membro->nome}}" disabled>
                    <!--mensagem de erro de validação-->
                    @error('nome')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{$membro->email}}" disabled>
                    <!--mensagem de erro de validação-->
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </form>
    @endif
@endsection
