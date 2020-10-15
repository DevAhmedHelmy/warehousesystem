<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->numberBetween($min = 1000, $max = 100000),
        'name' =>  $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'tax_number' => $faker->ean8,
    ];
});
