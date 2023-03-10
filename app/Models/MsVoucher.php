<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsVoucher extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'ms_voucher';
    protected $fillable = [
        'VoucherUUID',
        'voucher_id',
        'created_date',
        'valid_until_date',
        'discount_amount',
        'POUUID',
        'status',
        'ByUserUUID',
        'ByUserIP',
        'OnDateTime',
        'remarks',
    ];
}
