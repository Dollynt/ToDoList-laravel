<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
         if (session()->has('membro_id')) {
             return redirect('/homepage');
         }
        return view('login.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'senha');
        $membro = Membro::where('email', $credentials['email'])->first();

        //verifica se as credenciais batem
        if (!$membro || !Hash::check($credentials['senha'], $membro->senha)) {
            $errors = [];

            if (!$membro) {
                $errors['email'] = 'E-mail inválido';
            } else {
                $errors['senha'] = 'Senha inválida';
            }

            return back()->withErrors($errors)->withInput();
        }

        //armazena o id do membro na sessão
        $request->session()->put('membro_id', $membro->id);
        Session::flash('success', 'Login realizado com sucesso!');

        return redirect()->intended('/homepage');

    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
