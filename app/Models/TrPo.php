<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrPo extends Model
{
    use HasFactory;
    // protected $primaryKey = 'RequestOrderUUID';
    protected $table = 'tr_po';
    public $timestamps = false;
    protected $fillable = [
        'POUUID',
        'BatchUUID',
        'RequestOrderUUID',
        'CustomerUUID',
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
        'e_wallet_amount',
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
        'addendum_fee',
        'addendum_note',
        'dropshipper_name',
        'dropshipper_contact',
        'po_type',
    ];
    public function poDtls()
    {
        return $this->hasMany(TrPoDtl::class, 'POUUID', 'POUUID');
    }

    public function trRequestOrder()
    {
        return $this->belongsTo(TrRequestOrder::class, 'RequestOrderUUID', 'RequestOrderUUID');
    }

    public function msStatus()
    {
        // return $this->belongsTo(MsStatus::class, 'StatusUUID', 'StatusUUID');
        return $this->belongsTo(MsStatus::class, 'status', 'status_id');
    }

    public function msCustomer()
    {
        return $this->belongsTo(Registercostumer::class, 'CustomerUUID', 'CustomerUUID');
    }

    public function msBatch()
    {
        return $this->belongsTo(MsBatch::class, 'BatchUUID', 'BatchUUID');
    }
}
