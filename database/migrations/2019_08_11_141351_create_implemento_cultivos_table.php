<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImplementoCultivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('implemento_cultivos', function (Blueprint $table) {
            $table->integerIncrements('id_implemento')->unsigned();
            $table->integer('id_tipo')->unsigned();
            $table->timestamps();
        });

        Schema::table('implemento_cultivos', function (Blueprint $table) {
            $table->foreign('id_implemento')->references('id')->on('productos');
            $table->foreign('id_tipo')->references('id')->on('tipo_implementos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('implemento_cultivos');
    }
}
