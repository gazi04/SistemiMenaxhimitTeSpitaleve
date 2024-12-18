<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'item_name',
        'quantity',
        'unit_price',
        'expiry_date',
        'supplier_name',
    ];
}
