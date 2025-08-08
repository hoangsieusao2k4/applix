<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function apps()
    {
        return $this->hasMany(App::class);
    }
    public function collaboratedApps()
    {
        return $this->belongsToMany(App::class, 'app_user')
            ->withPivot('role')
            ->withTimestamps();
    }
    public function hasPermissionInApp($appId, $permission)
    {
        $record = $this->apps()->where('app_id', $appId)->first();
        if (!$record) return false;

        $permissions = json_decode($record->pivot->permissions, true) ?? [];
        return in_array($permission, $permissions);
    }
}
