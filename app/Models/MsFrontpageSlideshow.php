<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsFrontpageSlideshow extends Model
{
    use HasFactory;
    protected $table = 'ms_frontpage_slideshow';
    public $timestamps = false;
    protected $fillable = [
        'SlideUUID',
        // 'ProductUUID',
        'slide_name',
        'ArticleUUID',
        'seq',
        // 'animation_type',
        'image_slide',
        'status',
        // 'remarks',
        'created_date',
        'created_by',
        'ByUserUUID',
        'ByUserIP',
        'OnDateTime',
        // 'text1',
        // 'text2',
    ];
}
