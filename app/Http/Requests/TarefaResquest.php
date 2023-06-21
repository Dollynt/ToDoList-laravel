<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //regras de validação
        return [
            'nome' => 'required|min:5|max:50',
            'descricao' => 'max:140',
            'finalizada' => 'required|boolean',
            'data_termino' => 'nullable|date',
            'prioridade' => 'required|in:Baixa,Média,Alta',
        ];
    }
}
