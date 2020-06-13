<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' =>  $faker->unique()->name,
        'address' =>  $faker->address,
        'phone' => $faker->phoneNumber,
        'user_type' => $faker->randomElement($array = array ('cash', 'installment', 'checks')),
        'balance' => $faker->numberBetween($min = 1000, $max = 9000),
        'tax_number' => $faker->ean8,
    ];
});
