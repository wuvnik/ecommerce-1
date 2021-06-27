<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';

    protected $fillable= [
        'product_name',
        'product_title',
        'product_description',
        'product_price',
        'image_path',
        'stock',
        'seller_id',
    ];
    
}
