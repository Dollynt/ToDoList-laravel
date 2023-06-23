<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembroRequest extends FormRequest
{
    public function messages()
    {
        return [
            'nome.min' => 'O campo nome deve ter no mínimo :min caracteres.',
            'email.unique' => 'O email informado já está em uso.',
            'senha.min' => 'O campo senha deve ter no mínimo :min caracteres.'
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|min:5',
            'email' => 'required|email|unique:membros',
            'senha' => 'required|min:3'

        ];
    }
}
