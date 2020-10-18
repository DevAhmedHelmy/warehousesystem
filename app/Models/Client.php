<?php

namespace App\Models;

use App\Models\SaleBill;

class Client extends Model
{
    public function salesBills()
    {
        return $this->hasMany(SaleBill::class, 'client_id', 'id');
    }
    public function accounts()
    {
        return $this->hasMany(ClientAccount::class, 'client_id','id');
    }
}
