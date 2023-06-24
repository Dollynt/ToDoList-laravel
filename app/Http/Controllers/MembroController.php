<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use App\Http\Requests\MembroRequest;
use Illuminate\Support\Facades\Hash;

class MembroController extends Controller
{
    public function index()
    {
        $membros = Membro::all();
        return view('membros.index', compact('membros'));
    }

    public function create()
    {
        return view('membros.create');
    }

    public function store(MembroRequest  $request)
    {
        // Validação dos campos
        $membro = new Membro;
        $membro->nome = $request->nome;
        $membro->email = $request->email;
        $membro->senha = Hash::make($request->senha);

        //criação do membro
        $save = $membro->save();

        if($save) {
            return response()->json(['message' => 'Membro cadastrado com sucesso!', 'membro' => $membro], 201);
        }
        return response()->json(['message' => 'Erro ao cadastrar membro!'], 400);
    }

    public function edit(Request $request, $membroId) {
        $membro = Membro::findOrFail($membroId);

        return view('membros.edit', compact('membro'))->with('sessionId', session()->get('membro_id'));
    }

    public function update(MembroRequest $request, $membroId) {
        $membro = Membro::findOrFail($membroId);

        $membro->nome = $request->nome;
        if ($request->email !== $membro->email) {
            $membro->email = $request->email;
        }
        if (!empty($request->senha)) {
            $membro->senha = Hash::make($request->senha);
        }

        $save = $membro->save();
        if($save) {
            return response()->json(['message' => 'Membro atualizado com sucesso!', 'membro' => $membro], 201);
        }
        return response()->json(['message' => 'Erro ao cadastrar membro!'], 400);
    }

    public function delete(Request $request, $membroId)
    {
        $membro = Membro::findOrFail($membroId);
        $tarefas = Tarefa::where('membro_id', $membroId)->get();

        //excluir tarefas do membro
        foreach ($tarefas as $tarefa) {
            $tarefa->delete();
        }

        // Exclua o membro
        $delete = $membro->delete();
        if ($delete) {
            session()->forget('membro_id');
            return redirect('/login')->with('success', 'Membro excluído com sucesso');
        }
        return back()->with('error', 'Erro ao excluir membro');
    }
}

