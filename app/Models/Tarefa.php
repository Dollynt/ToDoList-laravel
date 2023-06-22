<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    //laravel obriga ter o timestamps, por isso está setado com falso
    public $timestamps = false;

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
