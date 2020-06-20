<?php

namespace App\Models;

use App\Models\Product;
use App\Models\SaleBill;

class InvoiceSaleBill extends Model
{

    public function saleBill()
    {
        return $this->belongsTo(SaleBill::class, 'sales_bill_id');
    }


    public function product()
    {
        return $this->hasOne(Product::class,'id');
    }


}
