<link rel="stylesheet" href="{{asset('css/membros/membros_create.css')}}">
<head>
    <title>LOGIN</title>
</head>
<body>
    <h1 id="cadastro">LOGIN</h1>

    <form method="POST" action="/login" id="form">
        @csrf

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
            <input type="text" class="@error('senha') is-invalid @enderror" name="senha" required>
            <!--mensagem de erro de validação-->
            @error('senha')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <button type="submit" id="button_submit">Entrar</button>
    </form>
</body>
