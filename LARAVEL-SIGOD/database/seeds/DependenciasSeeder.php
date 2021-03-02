<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DependenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('dependencias')->insert([
            'nombre_dependencia'        =>'DEPENDENCIA 1',
        ]);
    } 
}
