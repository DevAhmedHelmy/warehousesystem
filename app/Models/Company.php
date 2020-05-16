<?php

namespace App\Models;

use App\Models\Product;



class Company extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
