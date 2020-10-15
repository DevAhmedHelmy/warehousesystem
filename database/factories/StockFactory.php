<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Branch;
use App\Models\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    $branches = Branch::count();
    return [
        'name' =>  $faker->unique()->name,
        'address' =>  $faker->address,
        'phone' => $faker->phoneNumber,
        'branch_id' => rand(1,$branches),
    ];
});
