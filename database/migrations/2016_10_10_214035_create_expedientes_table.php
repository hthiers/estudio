<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         echo "Creando tabla expedientes...\n";
        Schema::create('expedientes', function(Blueprint $tabla){
            $tabla->bigIncrements('id');
            $tabla->string('titulo');
            $tabla->date('fecha');
            $tabla->integer('jurisdiccion_id')->unsigned();
            $tabla->foreign('jurisdiccion_id')->references('id')->on('jurisdicciones');
            $tabla->integer('rama_id')->unsigned()->nullable();
            $tabla->foreign('rama_id')->references('id')->on('ramas')->onDelete('set null');
            $tabla->timestamps();
            $tabla->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        echo "Dropping tabla expedientes...\n";
        Schema::dropIfExists('expedientes');
    }
}
