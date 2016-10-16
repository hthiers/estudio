<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        echo "Creando tabla citas...\n";
        Schema::create('citas', function (Blueprint $tabla){
            $tabla->increments('id');
            $tabla->string('titulo', 150);
            $tabla->timestamp('fecha_comienzo');
            $tabla->timestamp('fecha_fin')->nullable();
            $tabla->integer('user_id')->unsigned()->nullable();
            $tabla->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $tabla->bigInteger('cliente_id')->unsigned()->nullable();
            $tabla->foreign('cliente_id')->references('id')->on('clientes')->onDelete('set null');
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
        echo "Dropping tabla citas...\n";
        Schema::dropIfExists('citas');
    }
}
