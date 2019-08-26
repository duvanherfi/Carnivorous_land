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
            $table->string('fecha');
            $table->string('nombre_cliente');
            $table->string('ciudad');
            $table->string('direccion');
            $table->string('tipo_entrega');
            $table->string('estado');
            $table->string('entregado');
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
