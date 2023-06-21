<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|min:5',
            'email' => 'required|email|unique:membros',
            'senha' => 'required|min:3',
        ];
    }
}
