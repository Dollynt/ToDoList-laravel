<link rel="stylesheet" href="{{asset('css/login/login.css')}}">
<head>
    <title>LOGIN</title>
</head>
<body>
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <h1 id="login" class="center-text">LOGIN</h1>

        <form method="POST" action="/login" id="form" class="center-form">
            @csrf

            <div>
                <label for="email">E-mail:</label>
                <input type="email" class="@error('email') is-invalid @enderror" name="email" required>
                <!-- mensagem de erro de validação -->
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <label for="senha">Senha:</label>
                <input type="password" class="@error('senha') is-invalid @enderror" name="senha" required>
                <!-- mensagem de erro de validação -->
                @error('senha')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" id="button_submit">Entrar</button>
        </form>

        <a id="cadastro" href="/membros/create" class="center-text">Cadastrar</a>
    </div>
</body>
