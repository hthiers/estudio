<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurisdiccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        echo "Creando tabla jurisdicciones...\n";
        Schema::create('jurisdicciones', function(Blueprint $tabla){
            $tabla->increments('id');
            $tabla->string('jurisdiccion');
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
        echo "Dropping tabla jurisdicciones...\n";
        Schema::dropIfExists('jurisdicciones');
    }
}
