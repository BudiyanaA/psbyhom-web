<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreorderSg extends Model
{
    use HasFactory;
    protected $table = 'preorders_sg';
    protected $fillable = [
        'qty',
        'link',
        'name',
        'color',
        'sizeweight',
        'price',
        'po_type',
        'info',
    ];
}
