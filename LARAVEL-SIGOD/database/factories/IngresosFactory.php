<?php

use Faker\Generator as Faker;

$factory->define(App\Ingresos::class, function (Faker $faker) {
    return [
        'anio_ingreso'         =>$faker->year(),
         'post_traslado'        =>$faker->sentence(),
         'experiencia'          =>$faker->text(),
    ];
});
