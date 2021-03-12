<?php

use Faker\Generator as Faker;

$factory->define(App\Dependencias::class, function (Faker $faker) {
    return [
        'nombre_dependencia'        =>$faker->sentence(),
    ];
});
