<?php

use Faker\Generator as Faker;

$factory->define(App\Docente::class, function (Faker $faker) {
	return [
		'nombre' => $faker->firstName,
		'apellido' => $faker->lastName,
		'documento_identidad' => $faker->isbn10,
		'email' => "{$faker->username}@correounivalle.edu.co",
		'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

