<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->integerIncrements('id_compra')->unsigned();
            $table->string('nombre_articulo');
            $table->string('tamaño');
            $table->Integer('cantidad');
            $table->bigInteger('valor');
            $table->integer('id_pedido')->unsigned();

            $table->timestamps();
        });   


        Schema::table('compras', function (Blueprint $table) {
            $table->foreign('id_pedido')->references('id')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
