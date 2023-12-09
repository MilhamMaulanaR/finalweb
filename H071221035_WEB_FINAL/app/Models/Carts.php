<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_Id',
        'order_id',
        'user_id',
        'price',
        'status',
        'quantity',
        'amount',
    ];
}
