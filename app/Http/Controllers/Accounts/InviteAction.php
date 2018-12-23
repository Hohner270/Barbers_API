<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Domains\Models\Email\EmailAddress;
use App\Domains\UseCases\Accounts\InviteAccount;

use App\Http\Requests\InviteAccountRequest;
use App\Http\Responders\InviteAccountResponder;

class InviteAction extends Controller
{
    /**
     * @bodyParam email string required 招待されるユーザーのメールアドレス Example: example@exam.com
     * @response 204 {}
     * @response 400 {
     *  "error": "failed to send invite mail"
     * }
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
