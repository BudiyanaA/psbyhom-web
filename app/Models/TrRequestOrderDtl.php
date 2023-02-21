<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrRequestOrderDtl extends Model
{
    use HasFactory;
    protected $table = 'tr_request_order_dtl';
    protected $fillable = [
        'remarks',
        'RequestOrderUUID',
        'product_name',
        'product_url',
        'qty',
        'size',
        'color',
        'price_customer',
        'forex_rate',
        'subtotal_original',
        'status',
        'seq',
        'additional_fee',
        'subtotal_final',
        'disc_percentage',
    ];
}
