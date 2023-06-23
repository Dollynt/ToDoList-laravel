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
        return view('login.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'senha');
        $membro = Membro::where('email', $credentials['email'])->first();

        if (!$membro || !Hash::check($credentials['senha'], $membro->senha)) {
            $errors = [];

            if (!$membro) {
                $errors['email'] = 'E-mail inválido';
            } else {
                $errors['senha'] = 'Senha inválida';
            }

            return back()->withErrors($errors)->withInput();
        }

        Session::flash('success', 'Login realizado com sucesso!');
        return redirect()->intended('/homepage');

    }
}
