<?php

use Faker\Generator as Faker;

$factory->define(App\Bundles::class, function (Faker $faker) {
    return [
      'name' => $faker->numerify('bundles ###'),
      'visitors' => $faker->numberBetween($min = 0, $max = 100),
      'stats' => $faker->numberBetween($min = 0, $max = 100),
      'sales' => $faker->numberBetween($min = 0, $max = 100),
      'status' => $faker->boolean,
    ];
});
