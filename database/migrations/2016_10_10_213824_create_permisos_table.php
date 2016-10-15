<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        echo "Creando tabla permisos...\n";
        Schema::create('permisos', function (Blueprint $tabla) {
            $tabla->increments('id');
            $tabla->string('permiso');
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
        echo "Dropping tabla permisos...\n";
        Schema::dropIfExists('permisos');
    }
}
