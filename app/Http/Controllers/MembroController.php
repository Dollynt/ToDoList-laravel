<?php

namespace App\Http\Controllers;

use App\Models\Membro;
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

}

