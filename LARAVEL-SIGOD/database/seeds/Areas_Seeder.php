<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Areas_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'id_area'               =>'1',
            'nombre_area'           =>'Informatica',
        ]);

        DB::table('areas')->insert([
            'id_area'               =>'2',
            'nombre_area'           =>'Geografia',
        ]);

        DB::table('areas')->insert([
            'id_area'               =>'3',
            'nombre_area'           =>'Ingles',
        ]);

        DB::table('areas')->insert([
            'id_area'               =>'4',
            'nombre_area'           =>'Sistemas',
        ]);

        DB::table('areas')->insert([
            'id_area'               =>'5',
            'nombre_area'           =>'Computacion',
        ]);

        DB::table('areas')->insert([
            'id_area'               =>'6',
            'nombre_area'           =>'Deporte',
        ]);

        DB::table('areas')->insert([
            'id_area'               =>'7',
            'nombre_area'           =>'Administracion',
        ]);

        DB::table('areas')->insert([
            'id_area'               =>'8',
            'nombre_area'           =>'Matematicas',
        ]);
    }
}
