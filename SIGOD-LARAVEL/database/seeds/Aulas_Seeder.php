<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Aulas_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aulas')->insert([
            'numero'        =>'1',
            'nombre_aula'   =>'G12',
            'ubicacion'     =>'Hilandera', 
            'asignacion'    =>'Base de Datos', 
            'capacidad'     =>'40',
        ]);

        DB::table('aulas')->insert([
            'numero'        =>'2',
            'nombre_aula'   =>'G13',
            'ubicacion'     =>'Hilandera', 
            'asignacion'    =>'Base de Datos', 
            'capacidad'     =>'40',
        ]);

        DB::table('aulas')->insert([
            'numero'        =>'3',
            'nombre_aula'   =>'G13',
            'ubicacion'     =>'Hilandera', 
            'asignacion'    =>'Base de Datos', 
            'capacidad'     =>'40',
        ]);
    }
}
