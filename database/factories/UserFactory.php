<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
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
