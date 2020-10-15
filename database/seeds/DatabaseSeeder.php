<?php

use App\Models\Branch;
use App\Models\Stock;
use App\Models\Client;
use App\Models\Company;
use App\Models\Product;
use App\Models\Category;
use App\Models\SaleBill;
use App\Models\Supplier;
use App\Models\InvoiceSaleBill;
use App\Models\Unit;
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
        factory(Category::class, 5)->create();
        factory(Client::class, 5)->create();
        factory(Company::class, 5)->create();
        factory(Supplier::class, 5)->create();
        factory(Unit::class, 5)->create();
        factory(Branch::class, 5)->create();
        factory(Stock::class, 5)->create();
        factory(Product::class, 5)->create();
        $products = Product::all();
        // Populate the pivot table
        Stock::all()->each(function ($stock) use ($products) {
            $stock->products()->attach(
                $products->random(rand(1, 5))->pluck('id')->toArray(),
                ['first_balance' => 5,'end_balance'=>5]
            );
        });
        factory(SaleBill::class, 5)->create();
        factory(InvoiceSaleBill::class, 5)->create();


    }
}
