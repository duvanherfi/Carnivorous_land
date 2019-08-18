<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValoresCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valores_corporativos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('valor1');
            $table->string('valor2');
            $table->string('valor3');
            $table->string('valor4');
            $table->string('valor5');
            $table->string('valor6');
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
        Schema::dropIfExists('valores_corporativos');
    }
}
