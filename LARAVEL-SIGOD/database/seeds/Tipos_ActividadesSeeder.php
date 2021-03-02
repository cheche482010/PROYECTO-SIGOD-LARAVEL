<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Tipos_ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 DB::table('tipos__actvidades')->insert([
            'nombre_actividad'        =>'PROBANDO ACTIVIDAD 1',
        ]);
        
    } 
}
