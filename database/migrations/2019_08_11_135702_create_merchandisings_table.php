<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchandisingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandisings', function (Blueprint $table) {
            $table->integerIncrements('id_merchandising')->unsigned();
            $table->integer('id_tipo')->unsigned();
            $table->timestamps();
        });

        Schema::table('merchandisings', function (Blueprint $table) {
            $table->foreign('id_merchandising')->references('id')->on('productos');
            $table->foreign('id_tipo')->references('id')->on('tipo_merchandisings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchandisings');
    }
}
