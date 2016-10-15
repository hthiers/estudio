<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaClienteExpediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        echo "Creando tabla cliente_expediente...\n";
        Schema::create('cliente_expediente', function(Blueprint $tabla) {
            $tabla->bigIncrements('id');
            $tabla->bigInteger('expediente_id')->unsigned();
            $tabla->foreign('expediente_id')->references('id')->on('expedientes')->onDelete('cascade');
            $tabla->bigInteger('cliente_id')->unsigned();
            $tabla->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
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
         echo "Dropping tabla cliente_expediente...\n";
        Schema::dropIfExists('cliente_expediente');
    }
}
