<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Dedicaciones_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dedicaciones')->insert([
            'id_dedicacion'         =>'1',
            'abreviatura'     		=>'DE',
            'nombre_dedicacion'     =>'Dedicaion Exclusiva',
            'hora_dedicacion'     	=>'42',
        ]);

        DB::table('dedicaciones')->insert([
            'id_dedicacion'         =>'2',
            'abreviatura'     		=>'TC',
            'nombre_dedicacion'     =>'Tiempo Completo',
            'hora_dedicacion'     	=>'36',
        ]);

        DB::table('dedicaciones')->insert([
            'id_dedicacion'         =>'3',
            'abreviatura'     		=>'MT',
            'nombre_dedicacion'     =>'Medio Tiempo',
            'hora_dedicacion'     	=>'18',
        ]);

        DB::table('dedicaciones')->insert([
            'id_dedicacion'         =>'4',
            'abreviatura'     		=>'TCV',
            'nombre_dedicacion'     =>'Tiempo Convencional',
            'hora_dedicacion'     	=>'7',
        ]);
    }
}
