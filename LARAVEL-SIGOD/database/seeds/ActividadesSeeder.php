<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actividades')->insert([
            'id_tipo_actividad'     =>'1',
            'descripcion_actividad' =>'GUARDANDO ACTIVIDAD 1',
            'id_dependencia'        =>'1',
        ]);
    } 
}
