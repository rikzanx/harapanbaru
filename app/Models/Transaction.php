<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        "wallet_id",
        "amount",
        "tipe",
        "balance_after",
        "description"
    ];

    public function invoice(){
        return $this->hasOne('App\Models\Wallet','id','wallet_id');
    }
}
