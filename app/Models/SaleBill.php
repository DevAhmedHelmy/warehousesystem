<?php

namespace App\Models;

use App\Models\InvoiceSaleBill;



class SaleBill extends Model
{

    public function invoiceSaleBills()
    {
        return $this->hasMany(InvoiceSaleBill::class);
    }


    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
