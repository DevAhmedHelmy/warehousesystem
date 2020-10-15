<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->numberBetween($min = 1, $max = 9000),
        'name' =>  $faker->unique()->word,
    ];
});
