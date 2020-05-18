<?php

namespace App\Models;
use App\Models\Stock;
use App\Models\Company;
use App\Models\Category;

class Product extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function stocks()
    {
        return $this->belongsToMany(Stock::class, 'stock_products', 'product_id', 'stock_id');
    }

}

