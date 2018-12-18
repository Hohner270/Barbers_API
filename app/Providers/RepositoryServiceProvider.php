<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Domains\Repositories\Account\AccountQueryRepository;
use App\Infrastructures\Repositories\Applications\Auth\AuthManagerAccountRepository;

use App\Domains\Repositories\Email\MailCommandRepository;
use App\Infrastructures\Repositories\Application\Email\LaravelMailerCommandRepositoryImpl;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AccountQueryRepository::class, AuthManagerAccountRepository::class);
        $this->app->bind(MailCommandRepository::class, LaravelMailerCommandRepositoryImpl::class);
    }
}
