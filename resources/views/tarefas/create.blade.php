<link rel="stylesheet" href="{{asset('css/membros/membros_create.css')}}">
<head>
    <title>Cadastro de Tarefas</title>
</head>
<body>
    <h1 id="cadastro">Cadastro de Tarefas</h1>

    <form method="POST" action="/tarefas" id="form">
        @csrf

        <div>
            <label for="nome">Nome da tarefa:</label>
            <input type="text" class="@error('nome') is-invalid @enderror" name="nome" required>
            <!--mensagem de erro de validação-->
            @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="descricao">Descrição:</label>
            <input type="text" class="@error('descricao') is-invalid @enderror" name="descricao" required>
            <!--mensagem de erro de validação-->
            @error('descricao')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="finalizada">Finalizada:</label>
            <select id="finalizada" name="finalizada" required>
                <option value="false">Não</option>
                <option value="true">Sim</option>
            </select>
        </div>

        <div>
            <label for="data_termino">Data de término:</label>
            <input type="datetime-local" id="data_termino" name="data_termino">
        </div>

        <div>
            <label for="prioridade">Prioridade:</label>
            <select id="prioridade" name="prioridade">
              <option value="baixa" selected>Baixa</option>
              <option value="media">Média</option>
              <option value="alta">Alta</option>
            </select>
        </div>

        <button type="submit" id="button_submit">Cadastrar</button>
    </form>
</body>