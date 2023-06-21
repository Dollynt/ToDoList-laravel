<head>
    <title>Cadastro de Membro</title>
</head>
<body>
    <h1>Cadastro de Membro</h1>

    <form method="POST" action="/membros">
        @csrf

        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <!--mensagem de erro de validação-->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit">Cadastrar</button>
    </form>
</body>
