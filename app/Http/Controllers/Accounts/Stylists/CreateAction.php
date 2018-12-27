<?php

namespace App\Http\Controllers\Accounts\Stylists;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stylists\CreateStylistRequest;
use App\Http\Responders\Stylists\CreateStylistResponder;

use App\Domains\UseCases\Accounts\Stylists\CreateStylistUseCase;

use App\Domains\Models\Account\Guest;
use App\Domains\Models\Account\Stylist;
use App\Domains\Models\BaseAccount\AccountName;
use App\Domains\Models\BaseAccount\AccountPassword;
use App\Domains\Models\BaseAccount\AccountType;
use App\Domains\Models\Email\EmailAddress;

class CreateAction extends Controller
{
    public function __invoke(
        CreateStylistRequest $request, 
        CreateStylistUseCase $createStylistUseCase,
        CreateStylistResponder $responder
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
