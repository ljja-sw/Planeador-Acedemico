<?php

use Faker\Generator as Faker;

$factory->define(App\Docente::class, function (Faker $faker) {
	return [
		'nombre' => $faker->firstName,
		'apellido' => $faker->lastName,
		'documento_identidad' => $faker->isbn10,
		'email' => "{$faker->username}@correounivalle.edu.co",
		'email_verified_at' => now(),
        'password' => '$2y$10$jUZo0J5oc28Otv2VXlIMI.cRa8mmtImT1N6FePGltpIH.gORYEE3W', // planeadoru
        'remember_token' => Str::random(10),
    ];
});

