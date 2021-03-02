<?php

use Faker\Generator as Faker;

$factory->define(App\Tipos_Actividades::class, function (Faker $faker) {
    return [
        'nombre_actividad'        =>$faker->sentence(),
    ];
});
