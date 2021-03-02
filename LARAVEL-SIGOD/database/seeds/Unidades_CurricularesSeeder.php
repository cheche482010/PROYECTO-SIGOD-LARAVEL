<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Unidades_CurricularesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades__curriculares')->insert([
            'nombre_unidad'          	=>'matematicas', 
            'trayecto'          		=>'2', 
            'fase'          			=>'2', 
            'id_eje_formacion'          =>'1', 
        ]); 
    }
}
