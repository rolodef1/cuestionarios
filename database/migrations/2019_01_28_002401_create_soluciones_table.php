<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolucionesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('soluciones', function (Blueprint $table) {
      $table->increments('id');
      $table->string('descripcion');
      $table->integer('intentos')->default(1);
      $table->datetime('fecha_limite');
      $table->datetime('fecha_asignado');
      $table->datetime('fecha_resuelto')->nullable();
      $table->decimal('nota')->nullable();
      $table->string('estado');
      $table->boolean('mayor_nota')->nullable();
      $table->integer('user_id')->unsigned()->index();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->integer('cuestionario_id')->unsigned()->index();
      $table->foreign('cuestionario_id')->references('id')->on('cuestionarios');
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
    Schema::dropIfExists('soluciones');
  }
}
