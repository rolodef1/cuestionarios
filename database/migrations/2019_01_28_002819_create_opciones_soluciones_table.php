<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpcionesSolucionesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('opciones_soluciones', function (Blueprint $table) {
      $table->increments('id');
      $table->string('opcion',300);
      $table->boolean('resp_correcta');
      $table->boolean('resp_elegida')->nullable();
      $table->integer('pregunta_id')->unsigned()->index();
      $table->foreign('pregunta_id')->references('id')->on('preguntas_soluciones')->onDelete('cascade');
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
    Schema::dropIfExists('opciones_soluciones');
  }
}
