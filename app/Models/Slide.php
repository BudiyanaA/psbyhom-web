<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $table = 'slides';
    protected $fillable = [
        'slideshow_name',
        'hyperlink',
        'image',
        'slideshow_no',
        'notes',
        'status',
    ];
}
