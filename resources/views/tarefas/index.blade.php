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
                <div class="task-description" data-task-id="{{ $tarefa->id }}" style="display:none"></div>
                <div class="task-actions">
                    <button class="action-button" onclick="show()">Visualizar</button>
                    <a href="{{ route('tarefas.show', ['tarefaId' => $tarefa->id]) }}" class="edit-link">Editar</a>
                    <form action="#" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Excluir</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        //pegar os dados do controller e usar no javascript
        var dados = {!! json_encode($tarefas) !!};
        function show(){
            var description_element = event.target.parentNode.parentNode.querySelector('.task-description');
            var taskId = description_element.dataset.taskId;
            var description = dados[taskId - 1].descricao
            if (description === null){
                description = ''
            }

            description_element.innerText = 'Descrição:\n'+description
            if (description_element.style.display === 'none') {
                description_element.style.display = 'block'
            } else {
                description_element.style.display = 'none'
            }

        }
    </script>
</body>
