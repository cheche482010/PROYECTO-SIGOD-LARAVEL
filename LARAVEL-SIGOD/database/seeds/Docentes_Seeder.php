<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class Docentes_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('docentes')->insert([
            'cedula'	        		=>'26878749',
            'primer_nombre'	    	    =>Str::random(10),
            'segundo_nombre'	        =>Str::random(10),
            'primer_apellido'	        =>Str::random(10),
            'segundo_apellido'	        =>Str::random(10),
            'correo'	        		=>'ejemplo@gmail.com',
            'direccion'	        		=>Str::random(10),
            'telefono'	        		=>'04265556007',
            'id_municipio'	        	=>'1',
            'id_ingreso'	        	=>'1',
            'id_categoria'	        	=>'1',
            'id_relacion_laboral'	    =>'1',
            'id_dedicacion'	        	=>'1',
            'id_area'	        		=>'1',
            'id_concurso'	        	=>'1',
            'titulo_pregrado'	        =>Str::random(10),
        ]);
    }
}
