<?php

namespace Claws\Providers;

use Illuminate\Support\ServiceProvider;
use \Claws\Support\Theme;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('theme',Theme::class);
    }
}
