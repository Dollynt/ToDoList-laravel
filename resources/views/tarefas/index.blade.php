<head>
    <title>Listagem de Tarefas</title>
    <link rel="stylesheet" href="{{asset('css/tarefas/tarefas_list.css')}}">
</head>
<body>
    <h1>Listagem de Tarefas</h1>
    <a href="{{ route('tarefas.create') }}" class="create-task-link">Criar Nova Tarefa</a>
    <div class="task-list">
        @foreach($tarefas as $tarefa)
            <div class="task">
                <div class="task-name">{{ $tarefa->nome }}</div>
                <div class="task-priority">Prioridade: {{ $tarefa->prioridade }}</div>
                <div class="task-status">Finalizada: {{ $tarefa->finalizada ? 'Sim' : 'Não' }}</div>
                <div class="task-description">{{ $tarefa->descricao }}</div>
                <div class="task-actions">
                    <a href="#">Visualizar</a>
                    <a href="#">Editar</a>
                    <form action="#" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Excluir</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>


    <script src="{{ asset('js/script.js') }}"></script>
</body>
