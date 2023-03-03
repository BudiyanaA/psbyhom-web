<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogTransaction extends Model
{
    use HasFactory;
    protected $table = 'log_transaction';
    public $timestamps = false;
    protected $fillable = [
        'LogTransUUID',
        'POUUID',
        'log_date',
        'action_desc',
        'created_by',
        'UserUUID',
    ];
}
