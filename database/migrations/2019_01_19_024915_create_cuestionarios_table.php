<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuestionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuestionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('intentos')->default(1);
            $table->datetime('fecha_limite');
            $table->time('hora_limite');
            $table->string('estado');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('asignatura_id')->unsigned()->index();
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('cascade');
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
        Schema::dropIfExists('cuestionarios');
    }
}
