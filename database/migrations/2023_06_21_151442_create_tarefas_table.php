<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            //nome com no máximo 50 cacteres e não nulo
            $table->string('nome', 50)->nullable(false);
            //descrição com no máximo 140 caracteres
            $table->string('descricao', 140)->nullable();
            //booleano se a tarefa foi finalizada ou não, não nulo
            $table->boolean('finalizada')->nullable(false);
            //data de término quando a tarefa for finalizada
            $table->dateTime('data_termino')->nullable();
            //prioridade da tarefa com definição dos valores, e valor padrão baixo caso em branco
            $table->enum('prioridade', ['Baixa', 'Média', 'Alta'])->default('Baixa');
            //tarefa só pode ser de um único membro
            $table->foreignId('membro_id')->constrained('membros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
}
