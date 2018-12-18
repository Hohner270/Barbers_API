<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Domains\Models\Email\EmailAddress;

use App\Domains\UseCases\Auth\InviteAccount;

class InviteAction extends Controller
{
    public function __invoke(Request $request, InviteAccount $inviteAccount)
    {
        $email = new EmailAddress($request->email);
        $inviteAccount($email);
    }
}
