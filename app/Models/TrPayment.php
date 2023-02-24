<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrPayment extends Model
{
    use HasFactory;
    protected $table = 'tr_payment';
    protected $fillable = [
        'PaymentUUID',
        'payment_id',
        'POUUID',
        'InvoiceUUID',
        'BankUUID',
        'image_path',
        'created_date',
        'created_by',
        'payment_amount',
        'payment_date',
        'bank_source',
        'account_no_source',
        'account_name_source',
        'remarks',
        'status',
        'ByUserUUID',
        'ByUserIP',
        'OnDateTime',
    ];
}
