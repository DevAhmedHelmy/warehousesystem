<?php

namespace App\Models;

 

class SupplierAccount extends Model
{
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
