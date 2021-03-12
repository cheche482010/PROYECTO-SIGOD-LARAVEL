<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tipos_Actividades_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_actividades')->insert([
            'nombre_actividad'        =>'ACTIVIDAD 1',
        ]);

        DB::table('tipos_actividades')->insert([
            'nombre_actividad'        =>'ACTIVIDAD 2',
        ]);

        DB::table('tipos_actividades')->insert([
            'nombre_actividad'        =>'ACTIVIDAD 3',
        ]);
    }
}
