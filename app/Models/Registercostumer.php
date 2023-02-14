<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registercostumer extends Model
{
    use HasFactory;
    protected $table = 'registercostumers';
    protected $fillable = [
        'nohp_1',
        'nohp_2',
        'address',
        'zip_code',
        'province',
        'city',
        'district',
        'captcha',
    ];
}
