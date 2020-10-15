<?php

namespace App\Models;

use App\Models\Supplier;
use App\Models\InvoicePurchaseBill;



class PurchaseBill extends Model
{
    public function invoicePurchaseBills()
    {
        return $this->hasMany(InvoicePurchaseBill::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
