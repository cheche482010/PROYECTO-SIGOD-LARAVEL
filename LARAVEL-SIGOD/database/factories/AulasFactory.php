<?php

use Faker\Generator as Faker;

$factory->define(\App\Aulas::class, function (Faker $faker) {
    return [
        'numero'	  => $faker->randomDigit(),
        'nombre_aula' => $faker->sentence(),
        'ubicacion'   => $faker->address(),
        'asignacion'  => $faker->sentence(),
        'capacidad'   => $faker->sentence(),
    ]; 
});  
