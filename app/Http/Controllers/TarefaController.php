<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use App\Http\Requests\TarefaRequest;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        return view('tarefas.index', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(TarefaRequest $request)
    {

        $tarefa = new Tarefa();
        $tarefa->nome = $request->nome;
        $tarefa->descricao = $request->descricao;
        $tarefa->finalizada = filter_var($request->finalizada, FILTER_VALIDATE_BOOLEAN);
        $tarefa->data_termino = $request->finalizada ? now() : null;
        $tarefa->prioridade = $request->prioridade ?? 'Baixa';
        $tarefa->membro_id = 1; //provisório

        if (!$tarefa->finalizada) {
            $tarefa->data_termino = null; // Define a data de término como null se a tarefa não foi finalizada
        }

        $tarefa->save();

        return response()->json(['message' => 'Tarefa cadastrada com sucesso!', 'tarefa' => $tarefa], 201);
    }

    public function show($taskId)
    {
        $tarefa = Tarefa::findOrFail($taskId);

        return view('tarefas.show', compact('tarefa'));
    }

    public function delete($taskId)
    {
        $tarefa = Tarefa::findOrFail($taskId);
        $delete = $tarefa->delete();
        if($delete) {
            return response()->json(['message' => 'Tarefa excluida com sucesso'], 200);
        }
        return response()->json(['message' => 'Erro ao excluir tarefa'], 400);
    }

    public function edit($taskId)
    {
        $tarefa = Tarefa::findOrFail($taskId);
    }
}
