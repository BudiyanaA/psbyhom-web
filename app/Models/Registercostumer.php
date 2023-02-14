<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registercostumer extends Model
{
    use HasFactory;
    protected $table = 'registercostumers';
    protected $fillable = [
        'nohp_1',
        'nohp_2',
        'address',
        'zip_code',
        'province',
        'city',
        'district',
        'captcha',
    ];
    public function getCity()
    {
        return $this->belongsTo(Region::class, 'city', 'kode');
    }

    public function getDistricts()
    {
        return $this->belongsTo(Region::class, 'district', 'kode');
    }

    public function getProvince()
    {
        return $this->belongsTo(Region::class, 'province', 'kode');
    }
}
