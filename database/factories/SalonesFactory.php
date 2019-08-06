<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\SalonSala::class, function (Faker $faker) {
	return [
		'nombre' => $faker->company,
		'slug' => str_slug($faker->unique()->company, '-'),
		'capacidad' => $faker->numberBetween(15,30)
	];
});

$factory->define(App\Horario::class, function (Faker $faker) {
	$hora_fin = $faker->time('H:i:s','23:00:00');
	$hora_inicio =$faker->time('H:i:s','19:00:00');
	return [
		'hora_inicio' => $hora_inicio,
		'hora_fin' => $hora_fin,
		'dia' => $faker->numberBetween(1,5),
		'jornada_id' => $faker->numberBetween(1,2),
		'salon_sala_id'  => 1
	];
});