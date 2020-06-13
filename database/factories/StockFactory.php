<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'name' =>  $faker->unique()->name,
        'address' =>  $faker->address,
        'phone' => $faker->phoneNumber,
    ];
});
