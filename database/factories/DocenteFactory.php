<?php

use Faker\Generator as Faker;

$factory->define(App\Dependencia::class, function (Faker $faker) {
	return [
		'nombre' => $faker->address,
        'codigo' => $faker->numberBetween(1,20),
    ];
});

$factory->define(App\Asignatura::class, function (Faker $faker) {
	return [
    	'nombre' => "{$faker->word} {$faker->word}",
    	'codigo' => $faker->numberBetween(1000,9999),
    	'grupo' => $faker->randomDigit,
    	'creditos' => $faker->randomDigit,
    	'intensidad_horaria' => $faker->randomDigit,
    	'habilitable' => $faker->boolean,
    	'validable' => $faker->boolean
    ];
});

$factory->define(App\Docente::class, function (Faker $faker) {
	return [
		'nombre' => $faker->firstName,
		'apellido' => $faker->lastName,
		'documento_identidad' => $faker->isbn10,
		'email' => $faker->unique()->safeEmail,
		'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'dependencia' => $faker->numberBetween(1,15),
        'remember_token' => Str::random(10),
    ];
});

