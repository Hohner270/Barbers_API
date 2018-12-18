<?php

namespace App\Domains\UseCases\Auth;

use App\Domains\Models\Email\EmailAddress;

use App\Domains\Repositories\Email\MailCommandRepository;
use App\Domains\Repositories\Account\AccountQueryRepository;

class InviteAccount
{
    private $mailRepo;
    private $accountQuery;

    public function __construct(MailCommandRepository $mailCommand, AccountQueryRepository $accountQuery)
    {
        $this->mailCommand = $mailCommand;
        $this->accountQuery = $accountQuery;
    }

    /**
     * ユーザーに招待メールを送る。トークン作成・保存・メール送信。メールアドレスとトークンを一緒に保存しておくべきか？
     * @param string email
     * @return bool
     */
    public function __invoke(EmailAddress $email): bool
    {
        // メール送信に必要なもの
        // 件名・招待者・送信先アドレス
        $account = $this->accountQuery->myAccount();
        return $this->mailCommand->send($email, $account);
    }
}