<?php

namespace App\Models;

 

class ClientAccount extends Model
{
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    public function saleBill()
    {
        return $this->belongsTo(SaleBill::class, 'sale_bill_id', 'id');
    }
}
