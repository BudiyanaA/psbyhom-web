<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrEwallet extends Model
{
    use HasFactory;
    protected $table = 'tr_ewallet';
    public $timestamps = false;
    protected $fillable = [
        'EWalletUUID',
        'CustomerUUID',
        'POUUID',
        'trans_date',
        'amount',
        'description',
    ];

    public function msCustomer()
    {
        return $this->belongsTo(Registercostumer::class, 'CustomerUUID', 'CustomerUUID');
    }
    public function po()
    {
        return $this->belongsTo(TrPo::class, 'POUUID', 'POUUID');
    }
}
