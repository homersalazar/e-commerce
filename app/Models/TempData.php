<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempData extends Model
{
    use HasFactory;
    protected $fillable = [
        'media_id'
    ];
}
