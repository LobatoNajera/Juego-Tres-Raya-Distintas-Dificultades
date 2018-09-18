<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvanceUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avance_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('personajes_desbloqueados');
            $table->integer('rondas_ganadas');
            $table->integer('rondas_jugadas');
            $table->integer('personaje_id');
            $table->integer('enemigo_id');
            $table->integer('historias_finalizadas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avance_users');
    }
}
