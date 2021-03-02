<?php

use Faker\Generator as Faker;

$factory->define(App\Concursos::class, function (Faker $faker) {
    return [
        'tipo_concurso'     =>$faker->sentence(),
         'anio_concurso'     =>$faker->date(),
    ];
});
