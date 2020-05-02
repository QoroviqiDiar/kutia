<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Page\PageRepositoryInterface',
            'App\Repositories\Page\PageRepository'
        );

        $this->app->bind(
            'App\Repositories\User\UserRepositoryInterface',
            'App\Repositories\User\UserRepository'
        );

        $this->app->bind(
            'App\Repositories\Role\RoleRepositoryInterface',
            'App\Repositories\Role\RoleRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
