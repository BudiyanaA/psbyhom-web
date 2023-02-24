<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsEmail extends Model
{
    use HasFactory;
    protected $table = 'ms_email';
    protected $fillable = [
        'EmailUUID',
        'email_name',
        'email_title',
        'email_content',
        'email_content_bottom',
        'created_date',
        'created_by',
        'ByUserUUID',
        'ByUserIP',
        'OnDateTime',
    ];
}
