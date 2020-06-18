<?php

use App\Models\Stock;
use App\Models\Client;
use App\Models\Company;
use App\Models\Product;
use App\Models\Category;
use App\Models\SaleBill;
use App\Models\InvoiceSaleBill;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        factory(Category::class, 1000)->create();
        factory(Client::class, 1000)->create();
        factory(Company::class, 1000)->create();
        factory(Stock::class, 1000)->create();
        factory(Product::class, 1000)->create();
        $products = Product::all();
        // Populate the pivot table
        Stock::all()->each(function ($stock) use ($products) {
            $stock->products()->attach(
                $products->random(rand(1, 1000))->pluck('id')->toArray(),
                ['first_balance' => 10,'end_balance'=>10]
            );
        });
        factory(SaleBill::class, 1000)->create();
        factory(InvoiceSaleBill::class, 1000)->create();


    }
}
