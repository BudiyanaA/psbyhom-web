<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsBatch extends Model
{
    use HasFactory;
    protected $table = 'ms_batches';
    protected $fillable = [
        'BatchUUID',
        'batch_id',
        'remarks',
        'status',
        'created_date',
        'created_by',
        'ByUserUUID',
        'ByUserIP',
        'OnDateTime',
    ];
}
