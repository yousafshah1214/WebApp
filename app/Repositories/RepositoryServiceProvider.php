<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Contracts\Repositories\UserRepositoryInterface',
            'App\Repositories\UserRepository');

        $this->app->bind('App\Contracts\Repositories\UserProfileRepositoryInterface',
            'App\Repositories\UserProfileRepository');

        $this->app->bind('App\Contracts\Repositories\SocialUserRepositoryInterface',
            'App\Repositories\SocialUserRepository');

        $this->app->bind('App\Contracts\Repositories\SliderRepositoryInterface',
            'App\Repositories\SliderRepository');

        $this->app->bind('App\Contracts\Repositories\AdminRepositoryInterface',
            'App\Repositories\AdminRepository');

        $this->app->bind('App\Contracts\Repositories\ImageRepositoryInterface',
            'App\Repositories\ImageRepository');

        $this->app->bind('App\Contracts\Repositories\ContentRepositoryInterface',
            'App\Repositories\ContentRepository');

        $this->app->bind('App\Contracts\Repositories\IconRepositoryInterface',
            'App\Repositories\IconRepository');
    }
}
