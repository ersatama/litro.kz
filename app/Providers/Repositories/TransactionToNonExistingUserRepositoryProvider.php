<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class TransactionToNonExistingUserRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\TransactionToNonExistingUser\TransactionToNonExistingUserRepositoryInterface::class,
            \App\Domain\Repositories\TransactionToNonExistingUser\TransactionToNonExistingUserRepositoryEloquent::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
