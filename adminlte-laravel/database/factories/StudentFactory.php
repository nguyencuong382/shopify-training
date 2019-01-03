<?php

use Faker\Generator as Faker;
use App\Student;

$factory->define(Student::class, function (Faker $faker) {
    return [
        "first_name" => $faker->firstName(),
        "last_name" => $faker->lastName(),
        "email" => $faker->unique()->safeEmail()
    ];
});
