<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsers extends Migration
{
    const USUARIO = 2;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        echo "Creando tabla users...\n";
        Schema::create('users', function (Blueprint $tabla) {
            $tabla->increments('id');
            $tabla->string('username')->unique();
            $tabla->string('nombre');
            $tabla->string('apellido');
            $tabla->string('email')->unique();
            $tabla->string('password');
            $tabla->rememberToken();
            $tabla->timestamps();
            $tabla->integer('rol_id')->unsigned()->nullable()->default(self::USUARIO);
            $tabla->foreign('rol_id')
                ->references('id')->on('roles')
                ->onDelete('set null');
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
        echo "Dropping tabla password_resets...\n";
        Schema::drop('users');
    }
}
