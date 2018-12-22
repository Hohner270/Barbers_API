<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Domains\Models\Email\EmailAddress;
use App\Domains\UseCases\Auth\InviteAccount;

use App\Http\Responders\InviteAccountResponder;

class InviteAction extends Controller
{
    /**
     * @param Request request->email
     * @param InviteAccount アカウント招待ユースケース
     */
    public function __invoke(Request $request, InviteAccount $inviteAccount, InviteAccountResponder $inviteAccountResponder)
    {
        $email = new EmailAddress($request->email);
        $isSent = $inviteAccount($email);

        return $inviteAccountResponder($isSent);
    }
}
