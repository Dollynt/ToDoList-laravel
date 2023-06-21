<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    protected $fillable = [
        'email',
        'nome',
    ];

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }
}
