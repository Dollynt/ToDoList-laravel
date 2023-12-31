<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\Membro;
use Illuminate\Http\Request;
use App\Http\Requests\TarefaRequest;
use Illuminate\Support\Facades\Session;

class TarefaController extends Controller
{
    public function list()
    {
        $tarefas = Tarefa::all();
        $membros = Membro::getMembros();
        return view('tarefas.list', compact('tarefas', 'membros'))->with('membroId', session()->get('membro_id'));
    }

    //função que retorna view de cadastro de tarefas
    public function create()
    {
        return view('tarefas.create');
    }

    public function store(TarefaRequest $request)
    {
        $tarefa = new Tarefa();
        $tarefa->nome = $request->nome;
        $tarefa->descricao = $request->descricao;
        $tarefa->finalizada = filter_var($request->finalizada, FILTER_VALIDATE_BOOLEAN);//filtro para tranformar true e false em 0 e 1
        $tarefa->data_termino = $request->finalizada ? now() : null;
        $tarefa->prioridade = $request->prioridade ?? 'Baixa';
        $tarefa->membro_id = $request->session()->get('membro_id');


        if (!$tarefa->finalizada) {
            $tarefa->data_termino = null; // Define a data de término como null se a tarefa não foi finalizada
        }

        $save = $tarefa->save();
        if($save) {
            return back()->with('success', 'Tarefa criada com sucesso');
        }
        return back()->with('error', 'Erro ao criar tarefa');
    }

    public function edit($taskId)
    {
        $tarefa = Tarefa::findOrFail($taskId);

        //verifica se membro logado é dono da tarefa
        if ($tarefa->membro_id !== session()->get('membro_id')) {
            abort(403);
        }

        return view('tarefas.edit', compact('tarefa'));
    }

    //função de deletar tarefa
    public function delete($taskId)
    {
        $tarefa = Tarefa::findOrFail($taskId);
        $save = $delete = $tarefa->delete();

        //verifica qual a url anterior
        $previousUrl = url()->previous();
        if($save) {
            //se estava na página de edição, retorna para tarefas/list
            if (strpos($previousUrl, 'tarefas/'.$taskId) !== false) {
                return redirect()->route('tarefas.list')->with('success', 'Tarefa excluída com sucesso');
            } else {
                //se não, estava em tarefas/list)
                return back()->with('success', 'Tarefa excluída com sucesso');
            }
        }
        return back()->with('error', 'Erro ao excluir tarefa');
    }

    //função para atualizar tarefa
    public function update(TarefaRequest $request, $taskId)
    {
        $tarefa = Tarefa::findOrFail($taskId);

        $tarefa->nome = $request->nome;
        $tarefa->descricao = $request->descricao;
        $tarefa->finalizada = filter_var($request->finalizada, FILTER_VALIDATE_BOOLEAN);//filtro para tranformar true e false em 0 e 1
        $tarefa->data_termino = $request->finalizada ? now() : null;
        $tarefa->prioridade = $request->prioridade;

        //define a data de término como null se a tarefa não foi finalizada
        if (!$tarefa->finalizada) {
            $tarefa->data_termino = null;
        }

        $save = $tarefa->save();

        if($save) {
            return back()->with('success', 'Tarefa atualizada com sucesso');
        }
        return back()->with('error', 'Erro ao atualizar tarefa');
    }

    //função de atualizar apenas se tarefa foi finalizada
    public function finalizada_update(Request $request, $taskId)
    {
        $tarefa = Tarefa::findOrFail($taskId);
        $tarefa->finalizada = filter_var($request->finalizada, FILTER_VALIDATE_BOOLEAN);
        $tarefa->data_termino = now();

        $save = $tarefa->save();
        if($save) {
            return back()->with('success', 'Tarefa atualizada com sucesso');
        }
        return back()->with('error', 'Erro ao atualizar tarefa');

    }
}
