<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Contracts\Models\UserModelInterface',
            'App\User');

        $this->app->bind('App\Contracts\Models\UserProfileModelInterface',
            'App\UserProfile');

        $this->app->bind('App\Contracts\Models\SocialUserModelInterface',
            'App\SocialUser');

        $this->app->bind('App\Contracts\Models\AdminModelInterface',
            'App\Admin');

        $this->app->bind('App\Contracts\Models\SliderModelInterface',
            'App\Slider');
    }
}
