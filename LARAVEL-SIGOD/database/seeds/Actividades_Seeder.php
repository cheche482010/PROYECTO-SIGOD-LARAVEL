<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Actividades_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actividades')->insert([
            'id_tipo_actividad'     =>'1',
            'descripcion_actividad' =>'ACTIVIDAD 1',
            'id_dependencia'        =>'1',
        ]);

        DB::table('actividades')->insert([
            'id_tipo_actividad'     =>'2',
            'descripcion_actividad' =>'ACTIVIDAD 2',
            'id_dependencia'        =>'2',
        ]);

        DB::table('actividades')->insert([
            'id_tipo_actividad'     =>'3',
            'descripcion_actividad' =>'ACTIVIDAD 3',
            'id_dependencia'        =>'3',
        ]);
    }
}
