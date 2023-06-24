<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Membro;

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
        $rules = [
            'nome' => 'required|min:5',
            'email' => 'required|email|unique:membros',
            'senha' => 'required|min:3'

        ];

        $membroId = session()->get('membro_id');
        $membro = Membro::find($membroId);

        if ($this->isMethod('PUT')) {
            $rules = [
                'nome' => 'min:5',
                'email' => 'email|unique:membros',
                'senha' => 'nullable|min:3'
            ];
            if ($this->has('email') && $this->input('email') === $membro->email) {
                unset($rules['email']);
            }
        }
        return $rules;
    }
}
