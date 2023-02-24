<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrEwallet extends Model
{
    use HasFactory;
    protected $table = 'tr_ewallet';
    protected $fillable = [
        'EWalletUUID',
        'CustomerUUID',
        'POUUID',
        'trans_date',
        'amount',
        'description',
    ];
}
