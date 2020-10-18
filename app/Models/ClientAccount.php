<?php

namespace App\Models;

use App\Models\AccountTransaction;



class ClientAccount extends Model
{
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    
    public function accounts()
    {
        return $this->hasMany(AccountTransaction::class, 'client_account_id', 'id');
    }
}
