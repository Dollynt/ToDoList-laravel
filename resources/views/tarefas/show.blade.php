<link rel="stylesheet" href="{{asset('css/tarefas/tarefas_show.css')}}">
<head>
    <title>Edição de Tarefa</title>
</head>
<body>
    <h1 id="cadastro">Edição de Tarefa</h1>
    <div id="form">
    <form method="POST" action="/tarefas/{{$tarefa->id}}" id="edit-form">
        @csrf
        @method('PUT')
        <div>
            <label for="nome">Nome da tarefa:</label>
            <input type="text" class="@error('nome') is-invalid @enderror" name="nome" value="{{$tarefa->nome}}">
            <!--mensagem de erro de validação-->
            @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="descricao">Descrição:</label>
            <textarea type="text" class="@error('descricao') is-invalid @enderror" name="descricao">{{$tarefa->descricao}}</textarea>
            <!--mensagem de erro de validação-->
            @error('descricao')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="edit-status">Finalizada:</label>
            <select id="finalizada" name="finalizada" required>
                <option value="False" {{ $tarefa->finalizada ? '' : 'selected' }}>Não</option>
                <option value="True" {{ $tarefa->finalizada ? 'selected' : '' }}>Sim</option>
            </select>
        </div>

        <div>
            <label for="data-termino">Data de Término:{{$tarefa->data_termino}}</label>
        </div>

        <div>
            <label for="prioridade">Prioridade:</label>
            <select id="prioridade" name="prioridade">
                <option value="baixa" {{ $tarefa->prioridade == 'Baixa' ? 'selected' : '' }}>Baixa</option>
                <option value="media" {{ $tarefa->prioridade == 'Média' ? 'selected' : '' }}>Média</option>
                <option value="alta" {{ $tarefa->prioridade == 'Alta' ? 'selected' : '' }}>Alta</option>
            </select>
        </div>


        <button type="submit" id="button_submit">Salvar</button>
    </form>
    <form method="POST" action="/tarefas/{{$tarefa->id}}" id="delete-form">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button">Excluir</button>
    </form>
    </div>
</body>
