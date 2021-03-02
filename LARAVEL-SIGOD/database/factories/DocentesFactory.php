<?php

use Faker\Generator as Faker;

$factory->define(App\Docentes::class, function (Faker $faker) {
    return [
        	'cedula'	        		=>$faker->unixTime(),
            'primer_nombre'	    	    =>$faker->firstNameMale(),
            'segundo_nombre'	        =>$faker->firstNameMale(),
            'primer_apellido'	        =>$faker->lastName(),
            'segundo_apellido'	        =>$faker->lastName(),
            'correo'	        		=>$faker->regexify(),
            'direccion'	        		=>$faker->address(),
            'telefono'	        		=>$faker->phoneNumber(),
            'id_municipio'	        	=>$faker->randomDigit(),
            'id_ingreso'	        	=>$faker->randomDigit(),
            'id_categoria'	        	=>$faker->randomDigit(),
            'id_relacion_laboral'	    =>$faker->randomDigit(),
            'id_dedicacion'	        	=>$faker->randomDigit(),
            'id_area'	        		=>$faker->randomDigit(),
            'id_concurso'	        	=>$faker->randomDigit(),
            'titulo_pregrado'	        =>$faker->sentence(),
    ];
});
