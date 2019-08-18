<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantas', function (Blueprint $table) {
            $table->integerIncrements('id_planta')->unsigned();
            $table->string('tamaño');
            $table->integer('id_genero')->unsigned();
            $table->timestamps();
        });

        Schema::table('plantas', function (Blueprint $table) {
            $table->foreign('id_planta')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('id_genero')->references('id')->on('generos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantas');
    }
}
