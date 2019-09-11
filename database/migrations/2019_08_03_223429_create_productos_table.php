<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('imagen_principal');
            $table->string('imagen2');
            $table->string('imagen3');
            $table->string('nombre');
            $table->bigInteger('valor');
            $table->integer('cantidad');
            $table->integer('stock_minimo');
            $table->integer('calificacion')->default(0);
            $table->float('calificacionDecimal')->default(0.00);
            $table->string('opcion_catalogo');
            $table->text('descripcion');
            $table->string('habilitado')->default('true');
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
        Schema::dropIfExists('productos');
    }
}
