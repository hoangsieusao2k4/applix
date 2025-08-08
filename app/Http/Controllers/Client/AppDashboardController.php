<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\App;
use Illuminate\Http\Request;

class AppDashboardController extends Controller
{
    //
    public function index(App $app)
    {
        // dd($app);
        // Chỉ hiển thị dashboard nếu user sở hữu app
        // $this->authorize('view', $app);

        return view('dashboard.index', compact('app'));
    }
    public function notification(App $app)
    {
        $subscription = $app->subscriptions()->where('is_active', true)->latest()->first();
        return view('dashboard.notification-new', compact('subscription'));
    }
    public function firebase(App $app)
    {
        $subscription = $app->subscriptions()->where('is_active', true)->latest()->first();
        return view('dashboard.firebase-new', compact('subscription'));
    }
    public function admob(App $app){
          $subscription = $app->subscriptions()->where('is_active', true)->latest()->first();
        return view('dashboard.admob', compact('subscription'));
    }
}
