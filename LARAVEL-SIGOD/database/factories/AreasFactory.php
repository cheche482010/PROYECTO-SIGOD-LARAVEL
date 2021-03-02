<?php

use Faker\Generator as Faker;

$factory->define(App\Areas::class, function (Faker $faker) {
    return [
        'nombre_area'           =>$faker->sentence(),
    ]; 
});
