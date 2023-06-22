<head>
    <link rel="stylesheet" href="{{asset('css/tarefas/tarefas_show.css')}}">
</head>
<div class="task">
    <div class="task-name">{{ $tarefa->nome }}</div>
    <div class="task-priority">Prioridade: {{ $tarefa->prioridade }}</div>
    <div class="task-status">Finalizada: {{ $tarefa->finalizada ? 'Sim' : 'Não' }}</div>
    <div class="task-description">Descrição: {{$tarefa->descricao}}</div>
</div>
