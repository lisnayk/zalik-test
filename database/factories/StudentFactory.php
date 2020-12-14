<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Student::class, function (Faker $faker) {
    return [
        'name'=>$faker->name
    ];
});
