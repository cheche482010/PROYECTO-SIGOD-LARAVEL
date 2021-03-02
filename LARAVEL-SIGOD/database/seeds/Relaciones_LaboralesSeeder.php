<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Relaciones_LaboralesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relaciones__laborales')->insert([
            'nombre_relacion'          =>'Fijo', 
        ]);

        DB::table('relaciones__laborales')->insert([
            'nombre_relacion'          =>'Contratado', 
        ]);

        DB::table('relaciones__laborales')->insert([
            'nombre_relacion'          =>'Necesidad de servicio', 
        ]);

        DB::table('relaciones__laborales')->insert([
            'nombre_relacion'          =>'Suplente', 
        ]);
    }
}
