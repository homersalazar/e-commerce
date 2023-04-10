<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'descript',
        'url_slug',
        'product_price',
        'rrp',
        'product_quantity',
        'category_id',
        'media_id',
        'product_weight',
        'stats'
    ];
    // public function media()
    // {
    //     return $this->belongsTo(Media::class, 'media_id', 'id');
    // }
}
