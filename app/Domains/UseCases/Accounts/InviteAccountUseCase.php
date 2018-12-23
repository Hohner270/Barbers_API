<?php

namespace App\Domains\UseCases\Accounts;

use App\Domains\Models\Email\Email;
use App\Domains\Models\Email\EmailAddress;

use App\Domains\UseCases\Mailers\MailUseCaseCommand;
use App\Domains\UseCases\Accounts\AccountUseCaseQuery;

use App\Domains\Models\Hashes\Hash;

class InviteAccountUseCase
{
    private $emailCommand;
    private $accountQuery;

    public function __construct(MailUseCaseCommand $emailCommand, AccountUseCaseQuery $accountQuery)
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

        $inviteToken = new Hash(uniqid(rand(), true));

        return $this->emailCommand->sendInviteMail($email, $inviteToken);
    }
}