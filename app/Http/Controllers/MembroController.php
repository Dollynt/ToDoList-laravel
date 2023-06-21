<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use Illuminate\Http\Request;
use App\Http\Requests\MembroRequest;

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
        $validatedData = $request->validated();

        // Criação do membro
        $membro = Membro::create($validatedData);

        return response()->json(['message' => 'Membro cadastrado com sucesso!', 'membro' => $membro], 201);
    }

}

