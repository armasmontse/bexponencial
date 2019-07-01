<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // admin
        // view()->composer('layouts.admin', 'App\Http\ViewComposers\AdminLayoutComposer');
        view()->composer('layouts.includes.admin._sidebar', 'App\Http\ViewComposers\Admin\AdminMainMenuComposer');
        // splash

        // email
        view()->composer('vendor.notifications.email', 'App\Http\ViewComposers\Emails\EmailLayoutComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
