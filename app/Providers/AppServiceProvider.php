<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\RoleService;
use App\Services\UserService;
use App\Services\OrderService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RoleService::class, function ()    {
            return new RoleService();
        });
        $this->app->bind(UserService::class, function ()    {
            return new UserService();
        });
        $this->app->bind(OrderService::class, function ()    {
            return new OrderService();
        });
    }

    public function provides()
    {
        return [
            RoleService::class,
            UserService::class,
            OrderService::class
        ];
    }
}
