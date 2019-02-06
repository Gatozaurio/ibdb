<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
	$name = $faker->firstNAme() . " " . $faker->lastName();
    return [
        'name' => $name,
		'slug' => str_slug($name),
		'bio' => $faker->text(500)
    ];
});
