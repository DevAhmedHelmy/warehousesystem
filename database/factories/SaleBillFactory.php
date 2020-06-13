<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use App\Models\SaleBill;
use Faker\Generator as Faker;

$factory->define(SaleBill::class, function (Faker $faker) {
    $totalClients = Client::count();
    return [
        'bill_number' => $faker->ean8,
        'total' => $faker->numberBetween($min = 2000, $max = 9000),
        'client_id' => rand(1,$totalClients),
    ];
});
