<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        "name",
        "balance",
        "description"
    ];

    public function transactions(){
        return $this->hasMany('App\Models\Transaction','wallet_id');
    }
}
