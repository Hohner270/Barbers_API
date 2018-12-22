<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Domains\Models\Email\EmailAddress;
use App\Domains\UseCases\Auth\InviteAccount;

use App\Http\Requests\InviteAccountRequest;
use App\Http\Responders\InviteAccountResponder;

class InviteAction extends Controller
{
    /**
     * @param InviteAccountRequest
     * @param InviteAccount アカウント招待ユースケース
     * @param InviteAccountResponder
     */
    public function __invoke(
        InviteAccountRequest $request,
        InviteAccount $inviteAccount,
        InviteAccountResponder $inviteAccountResponder
    ) {
        $email = new EmailAddress($request->email);
        $isSent = $inviteAccount($email);

        return $inviteAccountResponder($isSent);
    }
}
