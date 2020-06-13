<?php

namespace App\Models;

use App\Models\Product;
use App\Models\SaleBill;

class InvoiceSaleBill extends Model
{
    protected $table = 'invoice_sales_bills';
    public function saleBill()
    {
        return $this->belongsTo(SaleBill::class, 'sales_bill_id');
    }


    public function products()
    {
        return $this->hasMany(Product::class, 'product_id');
    }


}