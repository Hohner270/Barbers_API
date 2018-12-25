<?php

namespace App\Domains\UseCases\Accounts;

use App\Domains\Models\Account\Guest;
use App\Domains\Models\Account\Stylist;
use App\Domains\Models\BaseAccount\AccountName;
use App\Domains\Models\BaseAccount\AccountPassword;
use App\Domains\Models\Email\EmailAddress;

use App\Domains\UseCases\Accounts\AccountUseCaseCommand;

class CreateStylistUseCase
{
    private $accountCommand;

    public function __construct(AccountUseCaseCommand $accountCommand)
    {
        $this->accountCommand = $accountCommand;
    }

    public function __invoke(Guest $guest): Stylist
    {
        return $this->accountCommand->save($guest);
    }
}