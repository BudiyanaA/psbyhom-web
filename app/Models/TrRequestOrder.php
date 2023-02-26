<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrRequestOrder extends Model
{
    use HasFactory;
    protected $table = 'tr_request_order';
    public $timestamps = false;
    protected $fillable = [
        'CustomerUUID',
        'RequestOrderUUID',
        'request_id',
        'customer_name',
        'created_date',
        'status',
        'forex',
        'factor',
        'total_items',
        'total_price',
        'ByUserUUID',
        'ByUserIP',
        'OnDateTime',
        'POUUID',
        'InvoiceUUID',
        'note',
    ];

    public function customer()
{
    return $this->belongsTo(Registercostumer::class, 'CustomerUUID', 'CustomerUUID');
}






}
