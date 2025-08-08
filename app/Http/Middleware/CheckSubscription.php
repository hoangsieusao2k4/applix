<?php

namespace App\Http\Middleware;

use App\Models\App;
use Closure;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;

class CheckSubscription
{
    public function handle(Request $request, Closure $next)
    {

        $app = $request->route('app'); // thường là 'slug'
        // dd($app);


        // $app = App::where('slug', $appSlug)->first(); // tìm object App


        if (!$app) {
            return abort(403, 'App không tồn tại.');
        }

        $subscription = $app->subscriptions()
            ->where('expires_at', '>', now())
            ->latest('expires_at')
            ->first();

        if (!$subscription) {
            return redirect()->route('payment.index', $app)
                ->with('error', 'App của bạn đã hết hạn gói. Vui lòng gia hạn.');
        }

        return $next($request);
    }
}
