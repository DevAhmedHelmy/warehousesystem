<?php

namespace App\Models;
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
}

