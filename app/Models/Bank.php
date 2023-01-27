<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'banks';
    protected $fillable = [
        'bank_name',
        'bank_account_name',
        'bank_account_no',
        'status',
        'notes',
    ];
}
