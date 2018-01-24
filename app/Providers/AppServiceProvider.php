<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Models\Clima;
use App\Models\Temperatura;
use App\Models\User;
use AdinanCenci\Climatempo\Climatempo;

use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Consertar o erro do MariaDB
        Schema::defaultStringLength(191);

        $temperatura    = Temperatura::orderBy('created_at', 'desc')->first();
        $clima          = Clima::orderBy('created_at', 'desc')->first();

        View::share(compact('temperatura','clima'));

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
