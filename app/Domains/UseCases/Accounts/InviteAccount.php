<?php

namespace App\Domains\UseCases\Accounts;

use App\Domains\Models\Email\Email;
use App\Domains\Models\Email\EmailAddress;

use App\Domains\UseCases\Accounts\AccountEmailUseCaseCommand;
use App\Domains\UseCases\Accounts\AccountUseCaseQuery;

use App\Domains\Models\Tokens\Token;

class InviteAccount
{
    private $emailCommand;
    private $accountQuery;

    public function __construct(AccountEmailUseCaseCommand $emailCommand, AccountUseCaseQuery $accountQuery)
    {
        $this->emailCommand = $emailCommand;
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
            $account->accountName(),
            $account->emailAddress(),
            $to
        );

        $inviteToken = new Token(uniqid(rand(), true));

        return $this->emailCommand->sendInviteMail($email, $inviteToken);
    }
}