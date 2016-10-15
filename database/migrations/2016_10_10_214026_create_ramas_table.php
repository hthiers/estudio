<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        echo "Creando tabla ramas...\n";
        Schema::create('ramas', function(Blueprint $tabla){
            $tabla->increments('id');
            $tabla->string('rama');
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
        echo "Dropping tabla ramas...\n";
        Schema::dropIfExists('ramas');
    }
}
