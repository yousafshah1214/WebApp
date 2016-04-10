<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 08/4/2016
 * Time: 12:48 AM
 */

namespace App\Repositories;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Contracts\UserRepositoryInterface',
            'App\Repositories\UserRepository');
    }
}