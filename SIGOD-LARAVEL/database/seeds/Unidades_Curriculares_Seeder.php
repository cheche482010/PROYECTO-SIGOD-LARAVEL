<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Unidades_Curriculares_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades_curriculares')->insert([
            'nombre_unidad'          	=>'matematicas', 
            'trayecto'          		=>'Trayecto I', 
            'fase'          			=>'Fase 2', 
            'id_eje_formacion'          =>'1', 
        ]); 

        DB::table('unidades_curriculares')->insert([
            'nombre_unidad'          	=>'informatica', 
            'trayecto'          		=>'Trayecto II', 
            'fase'          			=>'Fase 2', 
            'id_eje_formacion'          =>'1', 
        ]); 

        DB::table('unidades_curriculares')->insert([
            'nombre_unidad'          	=>'electiva', 
            'trayecto'          		=>'Trayecto III', 
            'fase'          			=>'Fase 1', 
            'id_eje_formacion'          =>'1', 
        ]); 
    }
}
