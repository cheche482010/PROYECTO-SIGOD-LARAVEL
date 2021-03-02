<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesCurricularesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('unidades__curriculares', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_unidad_curricular');
            $table->string('nombre_unidad');
            $table->string('trayecto');
            $table->string('fase'); 
            $table->integer('id_eje_formacion')->unsigned();   
            $table->foreign('id_eje_formacion')->references('id_eje_formacion')->on('ejes__formacion');
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
        Schema::dropIfExists('unidades__curriculares');
    }
}
