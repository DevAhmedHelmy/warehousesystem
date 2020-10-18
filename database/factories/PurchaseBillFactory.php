<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\PurchaseBill;
use Faker\Generator as Faker;

$factory->define(PurchaseBill::class, function (Faker $faker) {
    $totalSuppliers = Supplier::count();
    $stocks = Stock::count();
    return [
        'bill_number' => $faker->ean8,
        'total' => $faker->numberBetween($min = 2000, $max = 9000),
        'supplier_id' => rand(1,$totalSuppliers),
        'stock_id' => rand(1,$stocks),
    ];
});
