<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppCustomization extends Model
{
    use HasFactory;
    protected $fillable = ['app_id', 'settings'];
    public function app()
    {
        return $this->belongsTo(App::class);
    }
}
