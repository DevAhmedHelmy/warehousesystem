<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Stock;
use App\Models\SaleBill;
use Faker\Generator as Faker;
use App\Models\InvoiceSaleBill;

$factory->define(InvoiceSaleBill::class, function (Faker $faker) {
    $totalBills = SaleBill::count();
    $totalProducts = Product::count();
    $totalstocks = Stock::count();
    return [
        'quantity' =>$faker->numberBetween($min = 20, $max = 100),
        'product_id'=>rand(1,$totalProducts),
        'stock_id'=>rand(1,$totalstocks),
        'sale_bill_id'=>rand(1,$totalBills),
        'total' => $faker->numberBetween($min = 2000, $max = 9000),
    ];
});
