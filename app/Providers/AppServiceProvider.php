<?php

namespace App\Providers;

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
        // if ($this->app->runningInConsole()) {
        //     $this->commands([
        //         \Barryvdh\DomPDF\Commands\InstallFont::class,
        //         // other dompdf commands...
        //     ]);
        // }
    }
}
