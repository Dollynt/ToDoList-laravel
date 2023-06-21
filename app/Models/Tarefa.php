<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'finalizada',
        'data_termino',
        'prioridade',
        'membro_id',
    ];

    public function membro()
    {
        return $this->belongsTo(Membro::class);
    }
}
