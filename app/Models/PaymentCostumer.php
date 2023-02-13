<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCostumer extends Model
{
    use HasFactory;
    protected $table = 'payment_costumers';
    protected $fillable = [
        'invoice_amount',
        'payment_amount',
        'bank_destination',
        'payment_date',
        'transaction_receipt',
        'bank_name',
        'bank_account',
        'account_name',
    ];
}
