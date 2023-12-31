<link rel="stylesheet" href="{{asset('css/membros/membros_create.css')}}">

@if (session()->has('membro_id'))
    @extends('nav_bar/nav_bar')
    @section('title', 'Cadastro de Membro')
    @section('content')
@else
    <head>
        <title>Cadastro de Membro</title>
    </head>
@endif

<body>
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert-error">
            {{ session('error') }}
        </div>
    @endif
    <h1 id="cadastro">Cadastro de Membro</h1>
    <div class="container">
    <form method="POST" action="/membros" id="form">
        @csrf

        <div>
            <label for="nome">Nome:</label>
            <input type="text" class="@error('nome') is-invalid @enderror" name="nome" required>
            <!--mensagem de erro de validação-->
            @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="email">E-mail:</label>
            <input type="email" class="@error('email') is-invalid @enderror" name="email" required>
            <!--mensagem de erro de validação-->
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="senha">Senha:</label>
            <input type="password" class="@error('senha') is-invalid @enderror" name="senha" required>
            <!--mensagem de erro de validação-->
            @error('senha')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" id="button_submit">Cadastrar</button>
    </form>
    @if (session()->has('membro_id') == false)
        <a href="/login">Login</a>
    @endif
    </div>
</body>


@if (session()->has('membro_id'))
    @endsection
@endif
