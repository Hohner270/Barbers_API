<?php

namespace App\Http\Controllers\Accounts\Stylists;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Stylists\InviteStylistRequest;
use App\Http\Responders\Stylists\InviteStylistResponder;

use App\Domains\Models\Email\EmailAddress;
use App\Domains\UseCases\Accounts\Stylists\InviteStylistUseCase;


class InviteAction extends Controller
{
    /**
     * @bodyParam email string required 招待されるユーザーのメールアドレス Example: example@exam.com
     * @response 204 {}
     * @response 400 {
     *  "error": "failed to send invite mail"
     * }
     * @param InviteStylistRequest
     * @param InviteStylistUseCase アカウント招待ユースケース
     * @param InviteStylistResponder
     */
    public function __invoke(
        InviteStylistRequest $request,
        InviteStylistUseCase $inviteStylistUseCase,
        InviteStylistResponder $inviteStylistResponder
    ) {
        $email = new EmailAddress($request->email);
        $isSent = $inviteStylistUseCase($email);

        return $inviteStylistResponder($isSent);
    }
}
