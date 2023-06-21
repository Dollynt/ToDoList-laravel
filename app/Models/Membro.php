<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    //laravel obriga ter o timestamps, por isso está setado com falso
    public $timestamps = false;


    protected $fillable = [
        'email',
        'nome',
    ];

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }
}
