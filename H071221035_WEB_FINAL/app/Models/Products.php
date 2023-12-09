<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'productName',
        'productLine',
        'productDescription',
        'quantityInStock',
        'buyPrice',
        'imagePath',
        '_token', // Tambahkan _token ke dalam fillable
    ];
}
