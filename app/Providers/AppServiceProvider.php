<?php

namespace App\Providers;

use App\Models\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('*', function ($view) {
            $app = request()->route('app');

            if ($app instanceof App) {
                $view->with('userApp', $app);
            } else {
                $view->with('userApp', null);
            }
        });
    }
}
