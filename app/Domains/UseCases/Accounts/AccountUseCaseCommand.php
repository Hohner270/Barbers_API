<?php

namespace App\Domains\UseCases\Accounts;

use App\Domains\Models\Account\Guest;

interface AccountUseCaseCommand
{
    /**
     * @param Guest
     * @return
     */
    public function save(Guest $guest);
}