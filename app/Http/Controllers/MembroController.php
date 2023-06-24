<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use App\Http\Requests\MembroRequest;
use Illuminate\Support\Facades\Hash;

class MembroController extends Controller
{
    //função que retorna view de cadastro de membro
    public function create()
    {
        return view('membros.create');
    }

    //função que atualiza membro
    public function store(MembroRequest  $request)
    {
        $membro = new Membro;
        $membro->nome = $request->nome;
        $membro->email = $request->email;
        $membro->senha = Hash::make($request->senha);//criptografa senha

        //cria membro
        $save = $membro->save();

        if($save) {
            return back()->with('success', 'Membro cadastrado com sucesso');
        }
        return back()->with('error', 'Erro ao cadastrar membro');
    }

    //função que retorna view de edição do membro
    public function edit(Request $request, $membroId) {
        $membro = Membro::findOrFail($membroId);

        return view('membros.edit', compact('membro'))->with('sessionId', session()->get('membro_id'));
    }

    //função que atualiza membro
    public function update(MembroRequest $request, $membroId) {
        $membro = Membro::findOrFail($membroId);

        $membro->nome = $request->nome;
        if ($request->email !== $membro->email) {
            $membro->email = $request->email;
        }
        if (!empty($request->senha)) {
            $membro->senha = Hash::make($request->senha);//criptografa senha
        }

        $save = $membro->save();//atualiza membro

        if($save) {
            return back()->with('success', 'Membro atualizado com sucesso');
        }
        return back()->with('error', 'Erro ao atualizar membro');
    }

    //função que exclui membro
    public function delete(Request $request, $membroId)
    {
        $membro = Membro::findOrFail($membroId);
        $tarefas = Tarefa::where('membro_id', $membroId)->get();

        //excluir tarefas do membro
        foreach ($tarefas as $tarefa) {
            $tarefa->delete();
        }

        //exclui o membro
        $delete = $membro->delete();
        if ($delete) {
            session()->forget('membro_id');//retira membro_id da session
            return redirect('/login')->with('success', 'Membro excluído com sucesso');
        }
        return back()->with('error', 'Erro ao excluir membro');
    }
}

