<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $totalCompanies = Company::count();
    $totalCategories = Category::count();
    return [
        'code' => $faker->unique()->numberBetween($min = 1000, $max = 9000),
        'name' =>  $faker->unique()->name,
        'category_id' => rand(1,$totalCompanies),
        'company_id' => rand(1,$totalCompanies),
        'sale_price' => $faker->numberBetween($min = 200, $max = 1000),
        'purchase_price' => $faker->numberBetween($min = 200, $max = 1000)
    ];
});
