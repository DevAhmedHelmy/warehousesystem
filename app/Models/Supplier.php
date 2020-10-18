<?php

namespace App\Models;

use App\Models\PurchaseBill;



class Supplier extends Model
{
    public function purchasesBills()
    {
        return $this->hasMany(PurchaseBill::class, 'supplier_id', 'id');
    }

    public function accounts()
    {
        return $this->hasMany(SupplierAccount::class, 'client_id','id');
    }
}
