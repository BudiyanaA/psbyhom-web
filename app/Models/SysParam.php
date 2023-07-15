<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysParam extends Model
{
    use HasFactory;
    protected $guarded = ['sys_id'];
    
    protected $table = 'sys_param';
    
    protected $primaryKey = 'sys_id';
    
    public $timestamps = false;
    protected $fillable = [
        'sys_id',
        'name',
        'value_name',
        'value_max',
        'value_size',
        'value_id',
        'value_type',
        'value_1',
        'value_2',
        'value_3',
        'value_4',
        'value_5',
        'value_position',
        'is_inactive',
        'ByUserUUID',
        'ByUserIP',
        'OnDateTime',
    ];

}
