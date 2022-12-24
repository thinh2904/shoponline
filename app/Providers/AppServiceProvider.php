<?php

namespace App\Providers;

// use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\View;

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
        Paginator::useBootstrap();

        $websiteSetting = Setting::first();
        View::share('appSetting', $websiteSetting);
    }
}
