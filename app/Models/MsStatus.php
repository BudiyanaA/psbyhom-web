<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsStatus extends Model
{
    use HasFactory;
    protected $table = 'ms_status';
    protected $fillable = [
        'StatusUUID',
        'status_id',
        'status_name',
        'type',
    ];
}
