<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\AuthManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTGuard;

use App\Http\Controllers\Controller;
use App\Http\Responders\TokenResponder;

class LoginAction extends Controller
{
    /**
     * @var AuthManager
     */
    private $authManager;

    /**
     * @param AuthManager
     */
    public function __construct(AuthManager $authManager)
    {
        $this->authManager = $authManager;
    }

    /**
     * @bodyParam email string required ログインするアカウントのメールアドレス Example: example@exam.com
     * @bodyParam password string required ログインするアカウントのパスワード Example: password
     * @response 200 {
     *  "access_token": "aaaaaaaa",
     *  "token_type": "bearer",
     *  "expires_in": 3600
     * }
     * @response 401 {
     *  "error": "Unauthrized"
     * }
     * @param Request
     * @param TokenResponder
     * @return JsonResponse
     */
    public function __invoke(Request $request, TokenResponder $responder): JsonResponse
    {
        $guard = $this->authManager->guard('api');
        
        $token = $guard->attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        return $responder(
            $token,
            $guard->factory()->getTTL() * 60
        );
    }
}