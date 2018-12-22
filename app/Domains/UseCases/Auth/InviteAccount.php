<?php

namespace App\Domains\UseCases\Auth;

use App\Domains\Models\Email\Email;
use App\Domains\Models\Email\EmailAddress;

use App\Domains\UseCases\Email\EmailUseCaseCommand;
use App\Domains\UseCases\Account\AccountUseCaseQuery;

class InviteAccount
{
    private $emailCommand;
    private $accountQuery;

    public function __construct(EmailUseCaseCommand $emailCommand, AccountUseCaseQuery $accountQuery)
    {
        $this->mailCommand = $emailCommand;
        $this->accountQuery = $accountQuery;
    }

    /**
     * ユーザーに招待メールを送る。トークン作成・保存・メール送信。メールアドレスとトークンを一緒に保存しておくべきか？
     * @param string email
     * @return bool
     */
    public function __invoke(EmailAddress $to): bool
    {
        $account = $this->accountQuery->myAccount();

        $email = new Email(
            $account->accountName()->value(),
            $account->emailAddress()->value(),
            $to
        );

        return $this->emailCommand->send($email);
    }
}