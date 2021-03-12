<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Ingresos_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingresos')->insert([
            'anio_ingreso'         =>'2021',
            'post_traslado'        =>'traslado',
            'experiencia'          =>'Media',
        ]);
    }
}
