<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasSolucionesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('preguntas_soluciones', function (Blueprint $table) {
      $table->increments('id');
      $table->string('pregunta',300);
      $table->string('tipo');
      $table->integer('solucion_id')->unsigned()->index();
      $table->foreign('solucion_id')->references('id')->on('soluciones')->onDelete('cascade');
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
    Schema::dropIfExists('preguntas_soluciones');
  }
}
