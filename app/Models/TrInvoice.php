<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrInvoice extends Model
{
    use HasFactory;
    protected $table = 'tr_invoice';
    public $timestamps = false;
    protected $fillable = [
        'InvoiceUUID',
        'POUUID',
        'RequestOrderUUID',
        'CustomerUUID',
        'invoice_id',
        'invoice_date',
        'created_by',
        'subtotal',
        'ongkir',
        'insurance',
        'block_package',
        'discount',
        'e_wallet_amount',
        'payment_methode',
        'unique_amount',
        'grand_total',
        'status_invoice',
        'ByUserUUID',
        'ByUserIP',
        'OnDateTime',
        'total_outstanding'
    ];
}
