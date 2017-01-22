<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Contracts\Services\AuthenticationServiceInterface',
            'App\Services\AuthenticationService');

        $this->app->bind('App\Contracts\Services\RegistrationServiceInterface',
            'App\Services\RegistrationService');

        $this->app->bind('App\Contracts\Services\EmailServiceInterface',
            'App\Services\EmailService');

        $this->app->bind('App\Contracts\Services\LoggerServiceInterface',
            'App\Services\LoggerService');

        $this->app->bind('App\Contracts\Services\RedirectServiceInterface',
            'App\Services\RedirectService');

        $this->app->bind('App\Contracts\Services\ExtraValidationServiceInterface',
            'App\Services\ExtraValidationService');

        $this->app->bind('App\Contracts\Services\DataExtractorServiceInterface',
            'App\Services\DataExtractorService');

        $this->app->bind('App\Contracts\Services\SliderServiceInterface',
            'App\Services\SliderService');

        $this->app->bind('App\Contracts\Services\UploadServiceInterface',
            'App\Services\UploadService');

        $this->app->bind('App\Contracts\Services\PageContentServiceInterface',
            'App\Services\PageContentService');
    }
}
