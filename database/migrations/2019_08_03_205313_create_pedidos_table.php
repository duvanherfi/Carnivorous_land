<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->integerIncrements('id')->unsigned();
            $table->bigInteger('referencia');
            $table->date('fecha');
            $table->string('nombre_cliente');
            $table->integer('telefono');
            $table->integer('cedula');
            $table->string('departamento');
            $table->string('ciudad');
            $table->string('barrio');
            $table->string('direccion');
            $table->string('estado');
            $table->bigInteger('total');
            $table->string('entregado')->default('no');
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
