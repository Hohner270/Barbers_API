<?php

namespace App\Http\Controllers\Accounts\Stylist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Domains\Models\Email\EmailAddress;
use App\Domains\UseCases\Accounts\InviteStylistUseCase;

use App\Http\Requests\InviteAccountRequest;
use App\Http\Responders\Stylist\InviteResponder;

class InviteAction extends Controller
{
    /**
     * @bodyParam email string required 招待されるユーザーのメールアドレス Example: example@exam.com
     * @response 204 {}
     * @response 400 {
     *  "error": "failed to send invite mail"
     * }
     * @param InviteAccountRequest
     * @param InviteStylistUseCase アカウント招待ユースケース
     * @param InviteStylistResponder
     */
    public function __invoke(
        InviteAccountRequest $request,
        InviteStylistUseCase $inviteAccountUseCase,
        InviteAccountResponder $inviteAccountResponder
    ) {
        $email = new EmailAddress($request->email);
        $isSent = $inviteAccountUseCase($email);

        return $inviteAccountResponder($isSent);
    }
}
