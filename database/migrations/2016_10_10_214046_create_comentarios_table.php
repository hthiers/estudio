<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        echo "Creando tabla comentarios...\n";
        Schema::create('comentarios', function(Blueprint $tabla){
            $tabla->bigIncrements('id');
            $tabla->text('comentario');
            $tabla->bigInteger('expediente_id')->unsigned();
            $tabla->foreign('expediente_id')->references('id')->on('expedientes')->onDelete('cascade');
            $tabla->integer('user_id')->unsigned()->nullable()->index();
            $tabla->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        echo "Dropping tabla comentarios...\n";
        Schema::dropIfExists('comentarios');
    }
}
