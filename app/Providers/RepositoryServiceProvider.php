<?php

namespace App\Providers;

use App\Contracts\AccountRepository;
use App\Contracts\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepositoryEloquent;
use App\Repositories\AccountRepositoryEloquent;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(AccountRepository::class, AccountRepositoryEloquent::class);
    }
}
