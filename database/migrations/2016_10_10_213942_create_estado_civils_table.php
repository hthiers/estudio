<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoCivilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        echo "Creando tabla estados_civiles...\n";
        Schema::create('estados_civiles', function(Blueprint $tabla) {
            $tabla->increments('id');
            $tabla->string('estado');
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
        echo "Dropping tabla estados_civiles...\n";
        Schema::dropIfExists('estados_civiles');
    }
}
