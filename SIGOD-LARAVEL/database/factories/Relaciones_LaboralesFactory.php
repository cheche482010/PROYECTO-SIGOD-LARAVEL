<?php

use Faker\Generator as Faker;

$factory->define(App\Relaciones_Laborales::class, function (Faker $faker) {
    return [
        'nombre_relacion'          =>$faker->sentence(), 
    ];
});
