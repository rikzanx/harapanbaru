<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
            "id_inv",
            "no_invoice",
            "duedate",
            "id_customer",
            "name_customer",
            "address_customer",
            "phone_customer",
            "comment",
            "diskon_rate",
            "tax_rate",
            "profit",
            "tanggal_pengiriman",
            "bayar",
            "created_at"
    ];

    public function items(){
        return $this->hasMany('App\Models\Item','invoice_id');
    }
}
