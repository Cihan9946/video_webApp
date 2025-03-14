<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
   public function boot()
    {
        Carbon::setLocale(app()->getLocale());
        Paginator::useBootstrap();
        RateLimiter::for('ip_address', function (Request $request) {
            return Limit::perHour(200)->by($request->ip())->response(function() {
                return abort(429);
            });
        });
    }
}
