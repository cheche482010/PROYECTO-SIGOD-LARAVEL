<?php

use Faker\Generator as Faker;

$factory->define(App\Municipios::class, function (Faker $faker) {
    return [
        'nombre'          =>$faker->sentence(), 
    ];
});
