<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registercostumer extends Model
{
    use HasFactory;
    protected $table = 'ms_customer';
    protected $fillable = [
        'CustomerUUID',
        'token_id',
        'customer_name',
        'password',
        'email',
        'handphone',
        'handphone2',
        'fax',
        'address',
        'kodepos',
        'provinsi',
        'kecamatan',
        'kota',
        'status',
        'created_date',
        'created_by',
        'OnDateTime',
        'ByUserUUID',
        'ByUserIP',
    ];
    function newid()
		{
			$uuid = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
			mt_rand( 0, 0x0fff ) | 0x4000,
			mt_rand( 0, 0x3fff ) | 0x8000,
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) );
			return $uuid;
		}
}
