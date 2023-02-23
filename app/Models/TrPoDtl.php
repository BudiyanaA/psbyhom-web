<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrPoDtl extends Model
{
    use HasFactory;
    protected $table = 'tr_po_dtl';
    protected $fillable = [
        'PODtlUUID',
        'POUUID',
        'RequestOrderDtlUUID',
        'qty',
        'incoming_qty',
        'price',
        'subtotal',
        'status',
        'seq',
        'refund_amount',
        'batch_no',
    ];
}
