<?php

namespace App\Providers;

use App\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
       
        View::composer('*', function ($view) {
            $eu_bus_route = Route::all();
            $view->with('eu_bus_route', $eu_bus_route);
        });
        Schema::defaultStringLength(191);
    }
}
