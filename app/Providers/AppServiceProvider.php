<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        \PagSeguro\Library::initialize();
        \PagSeguro\Library::cmsVersion()->setName("Itagrill")->setRelease("1.0.0");
        \PagSeguro\Library::moduleVersion()->setName("Itagrill")->setRelease("1.0.0");
    }
}
