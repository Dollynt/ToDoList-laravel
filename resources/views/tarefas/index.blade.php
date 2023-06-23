<?php
    $obfuscatedData = base64_encode(json_encode($tarefas));
?>
<script>
    var dados = JSON.parse(atob("<?php echo $obfuscatedData; ?>"));
</script>

@extends('nav_bar')

@section('title', 'Listagem de Tarefas')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/tarefas/tarefas_list.css') }}">
    <h1>Listagem de Tarefas</h1>
    <div class="create-task-container">
        <a href="{{ route('tarefas.create') }}" class="create-task-link">Criar Nova Tarefa</a>
    </div>

    <div class="task-list">
        @foreach($tarefas as $tarefa)
            <div class="task">
                <div class="task-name">{{ $tarefa->nome }}</div>
                <div class="task-priority">Prioridade: {{ $tarefa->prioridade }}</div>
                <form action="{{ route('tarefas.finalizada_update', ['tarefaId' => $tarefa->id]) }}" method="POST" class="task-form">
                    @csrf
                    @method('PUT')
                    <label for="edit-status" class="task-status">Finalizada:</label>
                    <select id="finalizada" name="finalizada" onchange="finalizadaChange(this)" required {{ $tarefa->finalizada ? 'disabled' : '' }}>
                        <option value="False" {{ $tarefa->finalizada ? '' : 'selected' }}>Não</option>
                        <option value="True" {{ $tarefa->finalizada ? 'selected' : '' }}>Sim</option>
                    </select>
                    <button class="save-button" style="display: none;">Salvar</button>
                </form>
                <div class="task-description" data-task-id="{{ $tarefa->id }}" style="display:none"></div>
                <div class="task-actions">
                    <button class="action-button" onclick="show()">Visualizar</button>
                    <a href="{{ route('tarefas.show', ['tarefaId' => $tarefa->id]) }}" class="edit-link">Editar</a>
                    <form method="POST" action="/tarefas/{{$tarefa->id}}"  class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Excluir</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <script src="js/tarefas/index.js"></script>
@endsection
