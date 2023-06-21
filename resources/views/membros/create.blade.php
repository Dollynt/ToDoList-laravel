<link rel="stylesheet" href="{{asset('css/membros/membros_create.css')}}">
<head>
    <title>Cadastro de Membro</title>
</head>
<body>
    <h1 id="cadastro">Cadastro de Membro</h1>

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

        <button type="submit" id="button_submit">Cadastrar</button>
    </form>
</body>
