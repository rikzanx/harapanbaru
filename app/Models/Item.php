<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        "invoice_id",
        "item_of",
        "description",
        "qty",
        "item_price",
    ];

    public function invoice(){
        return $this->hasOne('App\Models\Invoice','id','invoice_id');
    }
}
