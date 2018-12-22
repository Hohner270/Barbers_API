<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Domains\UseCases\Auth\InviteAccount;
use App\Domains\UseCases\Email\EmailUseCaseCommand;
use App\Infrastructures\Repositories\Application\Email\InviteAccountMailer;

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
            ->needs(EmailUseCaseCommand::class)
            ->give(InviteAccountMailer::class);
    }
}
