<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class App extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'website_url',
        'platform',
        'status',
        'config',
        'is_premium',
        'plan_type',
        'premium_expires_at',
        'build_output_path',
        'verification_token',
        'verified_at',
        'image',
        'android_package_name'

    ];
    protected $casts = [
        'config' => 'array',
        'verified_at' => 'datetime',
        'is_premium' => 'boolean',
        'premium_expires_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
            if (!$model->slug) {
                // Tạo slug cơ bản
                $baseSlug = Str::slug($model->name);

                // Kiểm tra nếu đã tồn tại slug trùng
                $slug = $baseSlug;
                $count = 1;

                while (static::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $count++;
                }

                $model->slug = $slug;
            }
            if (!$model->verification_token) {
                $model->verification_token = Str::random(40);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function builds()
    {
        return $this->hasMany(AppBuild::class, 'app_id');
    }
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'app_id');
    }
    public function activeSubscription()
    {
        return $this->subscriptions()
            ->where('is_active', true)
            ->latest('created_at')
            ->first();
    }
    public function isPremiumActive(): bool
    {
        if (!$this->is_premium) return false;

        if ($this->premium_expires_at) {
            return $this->premium_expires_at->isFuture();
        }

        return true; // lifetime hoặc không có expiry
    }
    /**
     * Lấy ngày hết hạn premium (null nghĩa lifetime hoặc không có)
     */
    public function premiumExpiresAt()
    {
        $sub = $this->activeSubscription();
        return $sub?->expires_at;
    }
    public function isSubscriptionExpired(): bool
    {
        $sub = $this->activeSubscription();
        return !$sub || ($sub->expires_at && $sub->expires_at->isPast());
    }
    public function hasUsedFreePlan(): bool
    {


        return $this->subscriptions()
            ->where('plan_type', 'free')
            ->exists();
    }
    public function splashScreen()
    {
        return $this->hasOne(SplashScreen::class);
    }
    public function collaborators()
    {
        return $this->belongsToMany(User::class, 'app_user')
            ->withPivot('permissions')
            ->withTimestamps();
    }
    public function customizations()
    {
        return $this->hasOne(AppCustomization::class);
    }
      public function advancedSettings()
    {
        return $this->hasOne(AppAdvancedSetting::class);
    }

}
