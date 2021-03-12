<?php

use Faker\Generator as Faker;

$factory->define(App\Unidades_Curriculares::class, function (Faker $faker) {
    return [
        'nombre_unidad'          	=>$faker->sentence(), 
            'trayecto'          		=>$faker->randomDigit(), 
            'fase'          			=>$faker->randomDigit(), 
            'id_eje_formacion'          =>$faker->randomDigit(), 
    ];
});
