<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preorder extends Model
{
    use HasFactory;
    protected $table = 'preorders';
    protected $fillable = [
        'qty',
        'link',
        'name',
        'color',
        'sizeweight',
        'price',
        'info',
    ];
}
