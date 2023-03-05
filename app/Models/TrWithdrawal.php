<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrWithdrawal extends Model
{
    use HasFactory;
    protected $table = 'tr_withdrawal';
    public $timestamps = false;
    protected $fillable = [
        'withdrawUUID',
        'bank_name',
        'account_no',
        'account_name',
        'CustomerUUID',
        'trans_date',
        'status',
        'amount',
        'ByUserUUID',
        'ByUserIP',
        'OnDateTime',
    ];

    public function msCustomer()
    {
        return $this->belongsTo(Registercostumer::class, 'CustomerUUID', 'CustomerUUID');
    }
}
