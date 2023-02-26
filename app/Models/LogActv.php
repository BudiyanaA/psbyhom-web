<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActv extends Model
{
    use HasFactory;
    protected $table = 'log_actv';
    public $timestamps = false;
    protected $fillable = [
        'id',
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
}
