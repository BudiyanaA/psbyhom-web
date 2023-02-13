<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processorder extends Model
{
    use HasFactory;
    protected $table = 'processorders';
    protected $fillable = [
        'name',
        'address',
        'province',
        'city',
        'district',
        'courier',
        'delivery',
        'zip_code',
        'nohp_1',
        'nohp_2',
        'notes',
    ];
}
