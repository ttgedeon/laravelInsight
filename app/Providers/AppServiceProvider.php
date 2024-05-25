<?php

namespace App\Providers;

use Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Account;
use App\Policies\UserPolicy;
use App\Policies\AccountPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->register(RepositoryServiceProvider::class);
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Account::class, AccountPolicy::class);
    }
}
