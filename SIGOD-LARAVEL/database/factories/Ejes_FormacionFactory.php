<?php

use Faker\Generator as Faker;

$factory->define(App\Ejes_Formacion::class, function (Faker $faker) {
    return [
        'nombre_eje'        =>$faker->sentence(),
    ];
});
