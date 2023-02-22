<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class RegisterCostumer extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;
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
    protected $hidden = [
        'password',
        'token_id',
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
