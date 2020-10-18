<?php

namespace App\Models;

use App\Models\Product;

class Stock extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class, 'stock_products', 'stock_id', 'product_id')
                    ->latest()
                    ->withPivot('first_balance', 'end_balance','additions','outgoing','saleBill_id','purchaseBill_id','created_at');
    }
    public function getProducts()
    {
        return $this->products->unique();
    }


}
