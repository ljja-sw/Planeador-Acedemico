<?php
use Faker\Generator as Faker;

$factory->define(App\Dependencia::class, function (Faker $faker) {
	return [
		'nombre' => $faker->address,
        'codigo' => $faker->numberBetween(1,20),
    ];
});

$factory->define(App\Programa::class, function (Faker $faker) {
	return [
		'nombre' => $faker->catchPhrase,
        'codigo' => $faker->numberBetween(2000,3000),
    ];
});

$factory->define(App\Asignatura::class, function (Faker $faker) {
	$name = ucwords($faker->unique()->word);
	return [
    	'nombre' => ucwords($faker->word),
    	'codigo' => $faker->numberBetween(1000,9999)."M",
    	'grupo' => $faker->numberBetween(40,42),
    	'creditos' => $faker->randomDigit,
    	'intensidad_horaria' => $faker->randomDigit,
    	'habilitable' => $faker->boolean,
		'validable' => $faker->boolean,
		'slug' => str_slug($name,'-')
    ];
});
