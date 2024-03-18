<?php

namespace App\Providers;

use App\Models\Location;
use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\Type;
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
        if (!app()->runningInConsole()) {
            view()->share([
                'types' => Type::all()->sortByDesc('id'),
                'locations' => Location::all()->sortByDesc('id')
            ]);
        };
    }
}
