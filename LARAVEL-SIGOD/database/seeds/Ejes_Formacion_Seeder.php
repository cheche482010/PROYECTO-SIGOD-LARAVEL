<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Ejes_Formacion_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ejes_formacion')->insert([
            'nombre_eje'        =>'Etico-Politico',
        ]);

        DB::table('ejes_formacion')->insert([
            'nombre_eje'        =>'Epistemologico',
        ]);

        DB::table('ejes_formacion')->insert([
            'nombre_eje'        =>'Trabajo-Productivo',
        ]);

        DB::table('ejes_formacion')->insert([
            'nombre_eje'        =>'Estetico Ludico',
        ]);

        DB::table('ejes_formacion')->insert([
            'nombre_eje'        =>'Socio-Ambiental',
        ]);
    }
}
