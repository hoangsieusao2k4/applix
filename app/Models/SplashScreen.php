<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SplashScreen extends Model
{
    use HasFactory;
    public function app()
    {
        return $this->belongsTo(App::class);
    }
    protected $fillable = [
        'app_id',
        'show_logo',
        'logo_path',
        'logo_size',
        'background_color',
        'background_dark_mode',
        'splash_bg_color_dark',
        'use_background_image',
        'background_type',
        'background_image_path',
        'background_gif_path',
        'splash_timeout',
        'splash_status_bar_use_default',
        'splash_status_bar_bg_color',
        'splash_status_bar_icon_color',
        'default_status_bar_bg_color',
        'default_status_bar_icon_color',
    ];
}
