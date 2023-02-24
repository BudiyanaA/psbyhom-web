<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrPo extends Model
{
    use HasFactory;
    protected $table = 'tr_po';
    protected $fillable = [
        'POUUID',
        'RequestOrderUUID',
        'po_id',
        'trans_date',
        'created_by',
        'subtotal',
        'disc',
        'insurance',
        'block_package',
        'ongkir',
        'ongkir_type',
        'unique_amount',
        'total_trans',
        'no_resi',
        'receiver_name',
        'receiver_address',
        'receiver_province',
        'receiver_city',
        'status',
        'ByUserUUID',
        'ByUserIP',
        'OnDateTime',
        'receiver_kecamatan',
        'receiver_hp1',
        'receiver_hp2',
        'receiver_kodepos',
        'is_dropshipper',
        'use_ewallet',
        'notes',
        'total_paid',
        'total_outstanding',
        'dp_amount',
        'refund_amount',
        'refund_flag',
        'total_seq',
        'courier_name',
        'verify_payment_date',
        'additional_shipping_fee',
        'address',
        'payment_dp',
        'payment_last',
    ];
}
