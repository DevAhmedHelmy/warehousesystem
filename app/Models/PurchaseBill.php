<?php

namespace App\Models;

use App\Models\Supplier;



class PurchaseBill extends Model
{
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
