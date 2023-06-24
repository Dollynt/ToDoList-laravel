<!-- ofuscar dados de tarefas para nao aparecer ao inspecionar -->
<?php
    $obfuscatedData = base64_encode(json_encode($tarefas));
?>
<script>
    var dados = JSON.parse(atob("<?php echo $obfuscatedData; ?>"));
</script>

@extends('nav_bar/nav_bar')

@section('title', 'Lista de Tarefas')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/tarefas/tarefas_list.css') }}">

    <!-- mensagens de sucesso e erro ao atualizar e excluir tarefa -->
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert-error">
            {{ session('error') }}
        </div>
    @endif

    <h1>Lista de Tarefas</h1>
    <div class="create-task-container">
        <a href="{{ route('tarefas.create') }}" class="create-task-link">Criar Nova Tarefa</a>
    </div>


    <div class="filter-container">
        <!-- filtro para mostrar todas as tarefas -->
        <div class="filter-option">
            <input type="radio" id="todas-tarefas" name="filtro-tarefas" onclick="todasTarefas()" checked>
            <label for="todas-tarefas">Todas as Tarefas</label>
        </div>

        <!-- filtro para mostrar tarefas do membro selecionado -->
        <div class="filter-option">
            <input type="radio" id="tarefas-membros" name="filtro-tarefas" onclick="tarefasMembros()">
            <label for="tarefas-membros">Tarefas dos Membros</label>
            <select class="search-container" onchange="showTarefaMembro(this.value)">
                <option style="display: none">Escolha o membro</option>
                @foreach ($membros as $membro)
                    <option value="{{$membro->id}}"> {{$membro->email}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- mostrar tarefas -->
    <div class="task-list">
        @foreach($tarefas as $tarefa)
            <div class="task" data-member-id="{{ $tarefa->membro_id }}">
                <div class="task-name">{{ $tarefa->nome }}</div>
                <div class="task-priority">Prioridade: {{ $tarefa->prioridade }}</div>
                <!-- verifica se membro logado é dono da tarefa -->
                @if ($tarefa->membro_id === $membroId)
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
                @else
                    <!-- finalizada retorna 0 ou 1, conversão para sim ou não-->
                    <div class="task-status">Finalizada: {{ $tarefa->finalizada ? 'Sim' : 'Não' }}</div>
                @endif
                <!-- passa o id da tarefa para que o dado nao possa ser inspecionado -->
                <div class="task-description" data-task-id="{{ $tarefa->id }}" style="display:none"></div>
                <div class="task-finalized" style="display:none"></div>
                <div class="task-actions">
                    <button class="action-button" onclick="show()">Visualizar</button>
                    <!-- verifica se membro logado é dono da tarefa -->
                    @if ($tarefa->membro_id === $membroId)
                        <a href="{{ route('tarefas.edit', ['tarefaId' => $tarefa->id]) }}" class="edit-link">Editar</a>
                        <form method="POST" action="/tarefas/{{$tarefa->id}}"  class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Excluir</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <script src="js/tarefas/index.js"></script>
@endsection
