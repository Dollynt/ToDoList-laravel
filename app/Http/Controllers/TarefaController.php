<?php

namespace App\Http\Controllers;
use App\Models\Tarefa;
use Illuminate\Http\Request;

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
        // Validação dos campos
        $validatedData = $request->validated();

        // Criação da tarefa
        $tarefa = Tarefa::create($validatedData);

        return redirect()->route('tarefas.show', $tarefa->id);
    }
}
