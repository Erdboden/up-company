<?php

namespace App\Providers;

use App\Domain;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $domains = \Cache::rememberForever('domains', function () {
            return Domain::all();
        });
        \View::share('domains', $domains);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
