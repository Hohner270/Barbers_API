<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Domains\UseCases\Accounts\CreateAccountUseCase;

use App\Domains\Models\Account\Guest;
use App\Domains\Models\Account\Stylist;
use App\Domains\Models\BaseAccount\AccountName;
use App\Domains\Models\BaseAccount\AccountPassword;
use App\Domains\Models\BaseAccount\AccountType;
use App\Domains\Models\Email\EmailAddress;

class CreateAction extends Controller
{
    public function __invoke(Request $request, CreateAccountUseCase $createAccountUseCase)
    {
        $guest = new Guest(
            new AccountName($request->input('name')),
            new EmailAddress($request->input('email')),
            new AccountType(Stylist::ACCOUNT_TYPE),
            new AccountPassword($request->input('password'))
        );

        $createAccountUseCase($guest);
    }
}
