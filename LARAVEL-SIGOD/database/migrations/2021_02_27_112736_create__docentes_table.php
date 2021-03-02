<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('cedula')->unique();
            $table->string('primer_nombre');
            $table->string('segundo_nombre');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->string('correo')->unique();
            $table->string('direccion');
            $table->string('telefono');

            $table->integer('id_municipio')->unsigned();
            $table->foreign('id_municipio')->references('id_municipio')->on('municipios');

            $table->integer('id_ingreso')->unsigned();
            $table->foreign('id_ingreso')->references('id_ingreso')->on('ingresos');

            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');

            $table->integer('id_relacion_laboral')->unsigned();
            $table->foreign('id_relacion_laboral')->references('id_relacion_laboral')->on('relaciones__laborales');

            $table->integer('id_dedicacion')->unsigned();
            $table->foreign('id_dedicacion')->references('id_dedicacion')->on('dedicaciones');

            $table->integer('id_area')->unsigned();
            $table->foreign('id_area')->references('id_area')->on('areas');

            $table->integer('id_concurso')->unsigned();
            $table->foreign('id_concurso')->references('id_concurso')->on('concursos');

            $table->string('titulo_pregrado');
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
        Schema::dropIfExists('docentes');
    }
}
