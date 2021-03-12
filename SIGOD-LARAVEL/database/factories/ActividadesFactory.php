<?php

use Faker\Generator as Faker;

$factory->define(App\Actividades::class, function (Faker $faker) {
    return [
        'id_tipo_actividad'	    => $faker->sentence(),
        'descripcion_actividad' => $faker->text(),
        'id_dependencia'   		=> $faker->randomDigit(),
    ];
}); 
