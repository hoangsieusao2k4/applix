<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppAdvancedSetting extends Model
{
    protected $table = 'app_advanced_settings';
    protected $fillable = ['app_id', 'settings'];
    protected $casts = [
        'settings' => 'array',
    ];

    public function app()
    {
        return $this->belongsTo(App::class, 'app_id');
    }
}
