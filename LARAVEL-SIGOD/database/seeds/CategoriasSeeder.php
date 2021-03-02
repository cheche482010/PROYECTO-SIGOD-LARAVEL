<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 DB::table('categorias')->insert([
            'id_categoria'               =>'1',
            'nombre_categoria'     =>'Instructor',
        ]);
        
         DB::table('categorias')->insert([
            'id_categoria'               =>'2',
            'nombre_categoria'     =>'Asistente',
        ]);

          DB::table('categorias')->insert([
            'id_categoria'               =>'3',
            'nombre_categoria'     =>'Agregado',
        ]);

         DB::table('categorias')->insert([
            'id_categoria'               =>'4',
            'nombre_categoria'     =>'Asociado',
        ]);

         DB::table('categorias')->insert([
            'id_categoria'               =>'5',
            'nombre_categoria'     =>'Titular',
        ]);
    }
}
