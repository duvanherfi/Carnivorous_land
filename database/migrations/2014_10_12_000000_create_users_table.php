<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('correo')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cedula');
            $table->string('telefono');
            $table->date('fecha_nacimiento');
            $table->string('sexo');
            $table->string('departamento');
            $table->string('ciudad');
            $table->string('barrio');
            $table->string('direccion');
            $table->string('rol')->default('cliente');
            $table->rememberToken();
            $table->timestamps();
            $table->primary('correo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
