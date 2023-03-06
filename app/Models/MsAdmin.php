<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsAdmin extends Model
{
    use HasFactory;
    protected $table = 'ms_admin';
    protected $fillable = [
        'AdminUUID',
        'user_id',
        'name',
        'profile_pict',
        'password',
        'email',
        'RoleUUID',
        'UsergroupUUID',
        'user_type',
        'created_date',
        'created_by',
        'login_attemp',
        'last_logout',
        'last_login',
        'is_login',
        'is_delete',
        'is_superadmin',
        'status',
        'ByUserUUID',
        'ByUserIP',
        'OnDateTime',
        'token_id',
    ];
}
