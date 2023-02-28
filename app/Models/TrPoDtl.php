<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrPoDtl extends Model
{
    use HasFactory;
    protected $primaryKey = 'RequestOrderDtlUUID';
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
    public function customer()
    {
        return $this->belongsTo(Registercostumer::class, 'CustomerUUID');
    }

    public function requestOrderDtl()
    {
        return $this->belongsTo(TrRequestOrderDtl::class, 'RequestOrderDtlUUID');
    }
}
