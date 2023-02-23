<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsBank extends Model
{
    use HasFactory;
    protected $table = 'ms_status';
    protected $fillable = [
        'BankUUID',
        'bank_name',
        'bank_account_no',
        'bank_account_name',
        'status',
        'created_by',
        'created_date',
        'ByUserUUID',
        'ByUserIP',
        'OnDateTime',
    ];
}
