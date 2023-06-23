<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->id();
            //email unico e não nulo
            $table->string('email')->nullable(false)->unique();
            //nome não nulo
            $table->string('nome')->nullable(false);
            //senha não nula com no mínimo 3 caracteres
            $table->string('senha')->nullable(false)->min(3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membros');
    }
}
