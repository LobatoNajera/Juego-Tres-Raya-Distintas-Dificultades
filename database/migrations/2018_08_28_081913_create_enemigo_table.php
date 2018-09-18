<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnemigoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enemigos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('nombre_archivo');
            $table->integer('dificultad');
            $table->timestamps();
        });
    }
    /*
    Mendicant Bias
    Fue la IA Forerunner más avanzada al momento de su creación, a la que se le asignó realizar la función de organizar las defensas de los Forerunners en contra del Flood durante la Guerra Forerunner-Flood. Sin embargo, más tarde desertó hacia el Flood, lo que finalmente causó que se volviera rampante y luchara en contra de sus creadores.
     */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enemigos');
    }
}
