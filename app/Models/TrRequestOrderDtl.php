<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrRequestOrderDtl extends Model
{
    use HasFactory;
    //  protected $primaryKey = 'RequestOrderUUID';
    protected $table = 'tr_request_order_dtl';
    public $timestamps = false;
    protected $fillable = [
        'RequestOrderDtlUUID',
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

        'additional_fee',
    ];

    public function customer()
    {
        return $this->belongsTo(Registercostumer::class, 'CustomerUUID', 'CustomerUUID');
    }

}
