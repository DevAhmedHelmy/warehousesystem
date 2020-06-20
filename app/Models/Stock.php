<?php

namespace App\Models;

use App\Models\Product;



class Stock extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class, 'stock_products', 'stock_id', 'product_id')->latest('id')->limit(1)->withPivot('first_balance', 'end_balance','additions','outgoing');
    }


}
