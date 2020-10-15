<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Company;
use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    $totalCompanies = Company::count();
    return [
        'name' =>  $faker->unique()->name,
        'address' =>  $faker->address,
        'phone' => $faker->phoneNumber,
        'user_type' => $faker->randomElement($array = array ('cash', 'installment', 'checks')),
        'company_id' => rand(1,$totalCompanies),
        'tax_number' => $faker->ean8,
    ];
});
