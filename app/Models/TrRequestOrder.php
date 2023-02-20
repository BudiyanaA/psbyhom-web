<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrRequestOrder extends Model
{
    use HasFactory;
    protected $table = 'tr_request_order';
    protected $fillable = [
        'AdminUUID',
        'RequestOrderUUID',
        'request_id',
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
    return $this->belongsTo('App\Models\MsCustomer');
}






}
