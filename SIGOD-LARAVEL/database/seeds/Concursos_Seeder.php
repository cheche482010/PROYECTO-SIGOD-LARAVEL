<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Concursos_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('concursos')->insert([
            'tipo_concurso'     =>'Credenciales',
            'anio_concurso'     =>'2015',
        ]);
        
        DB::table('concursos')->insert([
            'tipo_concurso'     =>'Oposicion',
            'anio_concurso'     =>'2017',
        ]);
    }
}
