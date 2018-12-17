<?php

namespace App\Domains\Models\Account;

use Illuminate\Support\Collection;

use App\Domains\Models\Collections;

class Accounts extends Collections
{
    /**
     * @param Account $account
     */
    public function add(Account $account)
    {
        $this->domains->push($account);
    }
}