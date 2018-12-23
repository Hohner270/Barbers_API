<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Domains\UseCases\Accounts\InviteAccount;
use App\Domains\UseCases\Accounts\AccountEmailUseCaseCommand;
use App\Infrastructures\Mailer\AccountMailer;

class MailServiceProvider extends ServiceProvider
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
        $this->app
            ->when(InviteAccount::class)
            ->needs(AccountEmailUseCaseCommand::class)
            ->give(AccountMailer::class);
    }
}
