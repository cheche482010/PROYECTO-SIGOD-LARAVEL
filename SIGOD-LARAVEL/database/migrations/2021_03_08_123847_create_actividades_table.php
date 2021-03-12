<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_actividad'); 
            $table->integer('id_tipo_actividad')->unsigned();            
            $table->foreign('id_tipo_actividad')->references('id_tipo_actividad')->on('tipos_actividades');
            $table->string('descripcion_actividad');
            $table->integer('id_dependencia')->unsigned();            
            $table->foreign('id_dependencia')->references('id_dependencia')->on('dependencias');
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
        Schema::dropIfExists('actividades');
    }
}
