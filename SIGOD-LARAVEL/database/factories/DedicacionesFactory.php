<?php

use Faker\Generator as Faker;

$factory->define(App\Dedicaciones::class, function (Faker $faker) {
    return [
        'abreviatura'     		=>$faker->title(),
         'nombre_dedicacion'     =>$faker->sentence(),
         'hora_dedicacion'     	=>$faker->time(),
    ];
});
