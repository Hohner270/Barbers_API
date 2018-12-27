<?php

namespace App\Domains\UseCases\Accounts;

use App\Domains\Models\Account\Guest;

use App\Domains\Models\BaseAccount\Account;
use App\Domains\Models\BaseAccount\AccountId;
use App\Domains\Models\Email\EmailAddress;
use App\Domains\Models\Hash;

interface AccountUseCaseCommand
{
    /**
     * @param Guest
     * @return Account Stylist or Member
     */
    public function save(Guest $guest): Account;

    /**
     * @param AccountId 招待者のアカウントID
     * @param EmailAddress 招待したメールアドレス
     * @param Hash 招待トークン
     * @return bool
     */
    public function saveInvitationToken(AccountId $accountId, EmailAddress $email, Hash $token): bool;
}