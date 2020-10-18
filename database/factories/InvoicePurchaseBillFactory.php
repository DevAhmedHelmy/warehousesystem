<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Stock;
use App\Models\Product;
use App\Models\PurchaseBill;
use Faker\Generator as Faker;
use App\Models\InvoicePurchaseBill;

$factory->define(InvoicePurchaseBill::class, function (Faker $faker) {
    $totalBills = PurchaseBill::count();
    $totalProducts = Product::count();
    $totalstocks = Stock::count();
    return [
        'quantity' =>$faker->numberBetween($min = 20, $max = 100),
        'product_id'=>rand(1,$totalProducts),
        'stock_id'=>rand(1,$totalstocks),
        'purchase_bill_id'=>rand(1,$totalBills),
        'total' => $faker->numberBetween($min = 2000, $max = 9000),
    ];
});
