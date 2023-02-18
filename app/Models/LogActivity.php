<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;
    protected $table = 'log_actv';
    protected $fillable = [
        'user_id',
        'UserUUID',
        'menu_nm',
        'log_time',
        'Description',
        'LogType',
        'user_type',
        'RefUUID',
        'is_financial',
        'is_error',
        'ByUserUUID',
        'ByUserIP',
        'OnDateTime',
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
