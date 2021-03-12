<?php

use Faker\Generator as Faker;

$factory->define(App\Categorias::class, function (Faker $faker) {
    return [
        'nombre_categoria'     =>$faker->sentence(),
    ];
});
