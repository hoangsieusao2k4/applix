<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    use HasFactory;
    protected $table = 'app_user';
    protected $fillable = [
        'app_id',
        'user_id',
        'permissions',
    ];
    protected $casts = [
        'permissions' => 'array',
    ];
}
