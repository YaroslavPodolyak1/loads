<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Load;
use App\Observers\CityObserver;
use App\Observers\LoadObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        City::observe(CityObserver::class);
        Load::observe(LoadObserver::class);
    }
}
