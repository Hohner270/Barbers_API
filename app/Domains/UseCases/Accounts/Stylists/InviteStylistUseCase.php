<?php

namespace App\Domains\UseCases\Accounts\Stylists;

use App\Domains\Models\Email\Email;
use App\Domains\Models\Email\EmailAddress;
use App\Domains\Models\Hash;

use App\Domains\UseCases\Mailers\MailerUseCaseCommand;
use App\Domains\UseCases\Accounts\AccountUseCaseQuery;
use App\Domains\UseCases\Accounts\AccountUseCaseCommand;


class InviteStylistUseCase
{
    /**
     * @var MailerUseCaseCommand メール操作UseCase
     */
    private $emailCommand;

    /**
     * @var AccountUseCaseQuery アカウント取得UseCase
     */
    private $accountQuery;

    /**
     * @var AccountUseCaseCommand アカウント操作UseCase
     */
    private $accountCommand;

    /**
     * @param MailerUseCaseCommand メール操作UseCase
     * @param AccountUseCaseQuery アカウント取得UseCase
     * @param AccountUseCaseCommand アカウント操作UseCase
     */
    public function __construct(
        MailerUseCaseCommand $emailCommand, 
        AccountUseCaseQuery $accountQuery, 
        AccountUseCaseCommand $accountCommand
    ) {
        $this->emailCommand = $emailCommand;
        $this->accountQuery = $accountQuery;
        $this->accountCommand = $accountCommand;
    }

    /**
     * ユーザーに招待メールを送る。トークン作成・保存・メール送信。
     * @param EmailAddress メールアドレス
     * @return string 招待トークン
     */
    public function __invoke(EmailAddress $to): string
    {
        $account = $this->accountQuery->myAccount();

        $email = new Email(
            $account->name(),
            $account->emailAddress(),
            $to
        );

        $inviteToken = new Hash(uniqid(rand(), true));

        $isSaved = $this->accountCommand->saveInvitationToken(
            $account->id(),
            $email->to(),
            $inviteToken
        );

        if (! $isSaved) return '';

        $this->emailCommand->sendInviteMail($email, $inviteToken);
        return $inviteToken;
    }
}