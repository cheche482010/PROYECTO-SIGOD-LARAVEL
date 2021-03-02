<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipios')->insert([
            'nombre'          =>'Andrés Eloy Blanco', 
        ]);

        DB::table('municipios')->insert([
           'nombre'          =>'Crespo',
        ]);

        DB::table('municipios')->insert([
           'nombre'          =>'Iribarren',
        ]);

        DB::table('municipios')->insert([
           'nombre'          =>'Jiménez',
        ]);

        DB::table('municipios')->insert([
           'nombre'          =>'Morán',
        ]);

        DB::table('municipios')->insert([
           'nombre'          =>'Palavecino',
        ]);

        DB::table('municipios')->insert([
           'nombre'          =>'Simón Planas',
        ]);

        DB::table('municipios')->insert([
           'nombre'          =>'Torres',
        ]);

        DB::table('municipios')->insert([
           'nombre'          =>'Urdaneta',
        ]);
    }
}
