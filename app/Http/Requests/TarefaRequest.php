<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'finalizada' => 'required',
            'data_termino' => 'nullable|date',
            'prioridade' => 'in:baixa,media,alta',
        ];
    }

    protected function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
