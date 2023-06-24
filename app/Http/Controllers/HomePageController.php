<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membro;

class HomePageController extends Controller
{
    public function index()
    {
        $nomeMembro = Membro::findOrFail(session()->get('membro_id'),['nome']);
        return view('homepage.homepage', compact('nomeMembro'))->with('membroId', session()->get('membro_id'));
    }
}
