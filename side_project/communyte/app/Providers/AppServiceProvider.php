<?php

namespace App\Providers;

use App\Exceptions\MyAuthException;
use App\Services\MyTokenService;
use App\Utils\MyToken;
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
        $this->app->bind('MyTokenService', function() {
            return new MyTokenService();
        });
        $this->app->bind('MyToken', function() {
            return new MyToken();
        });
        $this->app->bind('MyAuthException', function() {
            return new MyAuthException();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
