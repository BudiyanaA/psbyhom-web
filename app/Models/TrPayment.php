<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrPayment extends Model
{
    use HasFactory;
    protected $table = 'tr_payment';
    public $timestamps = false;
    protected $fillable = [
        'PaymentUUID',
        'payment_id',
        'POUUID',
        'InvoiceUUID',
        'BankUUID',
        'image_path',
        'created_date',
        'created_by',
        'payment_amount',
        'payment_date',
        'bank_source',
        'account_no_source',
        'account_name_source',
        'remarks',
        'status',
        'ByUserUUID',
        'ByUserIP',
        'OnDateTime',
    ];
    public function po()
    {
        return $this->belongsTo(TrPo::class, 'POUUID', 'POUUID');
    }
    public function bank()
    {
        return $this->belongsTo(MsBank::class, 'BankUUID', 'BankUUID');
    }
}
