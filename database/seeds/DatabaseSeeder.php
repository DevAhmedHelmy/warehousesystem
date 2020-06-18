<?php

use App\Models\Stock;
use App\Models\Client;
use App\Models\Company;
use App\Models\Product;
use App\Models\Category;
use App\Models\SaleBill;
use App\Models\Supplier;
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
        factory(Category::class, 50)->create();
        factory(Client::class, 50)->create();
        factory(Company::class, 50)->create();
        factory(Supplier::class, 50)->create();
        factory(Stock::class, 50)->create();
        factory(Product::class, 50)->create();
        $products = Product::all();
        // Populate the pivot table
        Stock::all()->each(function ($stock) use ($products) {
            $stock->products()->attach(
                $products->random(rand(1, 50))->pluck('id')->toArray(),
                ['first_balance' => 10,'end_balance'=>10]
            );
        });
        factory(SaleBill::class, 50)->create();
        factory(InvoiceSaleBill::class, 50)->create();


    }
}
