<?php

namespace Claws\Providers;

use Illuminate\Support\ServiceProvider;
use \Claws\Support\PostRegister;

class PostRegisterServiceProvider extends ServiceProvider
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
        $this->app->bind('postregister',PostRegister::class);
    }
}
