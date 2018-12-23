<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateAccountAction extends Controller
{
    public function __invoke(Request $request)
    {
        $email = new EmailAddress($request->input('email'));
        $accountName = new AccountName($request->input('name'));
        $accountPassword = new Token($request->input('password'));
    }
}
