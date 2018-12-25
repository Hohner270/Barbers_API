<?php

namespace App\Http\Controllers\Accounts\Stylist;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Responders\Stylist\CreateResponder;

use App\Domains\UseCases\Accounts\CreateStylistUseCase;

use App\Domains\Models\Account\Guest;
use App\Domains\Models\Account\Stylist;
use App\Domains\Models\BaseAccount\AccountName;
use App\Domains\Models\BaseAccount\AccountPassword;
use App\Domains\Models\BaseAccount\AccountType;
use App\Domains\Models\Email\EmailAddress;

class CreateAction extends Controller
{
    public function __invoke(
        Request $request, 
        CreateStylistUseCase $createStylistUseCase,
        CreateResponder $responder
    ) {
        $guest = new Guest(
            new AccountName($request->input('name')),
            new EmailAddress($request->input('email')),
            new AccountType(Stylist::ACCOUNT_TYPE),
            new AccountPassword($request->input('password'))
        );

        $stylist = $createStylistUseCase($guest);

        return $responder($stylist);
    }
}
