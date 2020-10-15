<?php

namespace App\Models;

use App\Models\Product;
use DB;


class Stock extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class, 'stock_products', 'stock_id', 'product_id')->latest()->withPivot('first_balance', 'end_balance','additions','outgoing');
    }


    public function getProducts()
    {
        return $this->products()->select([
            'products.*',
            DB::raw('(select max(sp.id) from stock_products sp where stock_products.product_id=sp.product_id) as "stock_products_id"'),
            DB::raw('(select sp2.first_balance from stock_products sp2 where sp2.id=stock_products_id) as "pivot_first_balance"'),
            DB::raw('(select sp3.end_balance from stock_products sp3 where sp3.id=stock_products_id) as "pivot_end_balance"'),
            DB::raw('(select sp4.additions from stock_products sp4 where sp4.id=stock_products_id) as "pivot_additions"'),
            DB::raw('(select sp5.outgoing from stock_products sp5 where sp5.id=stock_products_id) as "outgoing"'),
            
        ])
        ->groupBy('stock_products.product_id')
        ->get();
    }


}
