<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        echo "Creando tabla clientes...\n";
        Schema::create('clientes', function (Blueprint $tabla) {
            $tabla->bigIncrements('id');
            $tabla->string('nombre', 45);
            $tabla->string('apellido', 45);
            $tabla->date('fecha_nac')->nullable();
            $tabla->bigInteger('dni')->unique()->nullable()->default(null);
            $tabla->bigInteger('telefono')->nullable();
            $tabla->bigInteger('celular')->nullable();
            $tabla->string('email', 80)->nullable();
            $tabla->string('domicilio')->nullable();
            $tabla->boolean('activo')->default(true);
            $tabla->integer('estado_civil_id')->unsigned()->nullable()->index();
            $tabla->foreign('estado_civil_id')
                ->references('id')
                ->on('estados_civiles')
                ->onDelete('set null');
            $tabla->integer('estudio_id')->unsigned()->nullable()->index();
            $tabla->foreign('estudio_id')->references('id')->on('estudios')->onDelete('set null');
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
        echo "Dropping tabla clientes...\n";
        Schema::dropIfExists('clientes');
    }
}
