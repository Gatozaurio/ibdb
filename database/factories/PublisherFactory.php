<?php

use Faker\Generator as Faker;

$factory->define(App\Publisher::class, function (Faker $faker) {
	$name = $faker->company();
    return [
        'name' => $name,
		'slug' => str_slug($name, "-"),
		'address' => $faker->address(),
		'web' => $faker->url(),
		'email' => $faker->email()
    ];
});
