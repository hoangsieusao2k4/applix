<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_id',
        'plan_type',
        'price',
        'transaction_ref',
        'vnp_response_code',
        'vnp_transaction_no',
        'is_active',
        'expires_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'expires_at' => 'datetime',
    ];

    public function app()
    {
        return $this->belongsTo(App::class);
    }
}


