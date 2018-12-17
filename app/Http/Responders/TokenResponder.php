<?php

namespace App\Http\Responders;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TokenResponder
{
    public function __invoke($token, int $ttl): JsonResponse
    {
        if (! $token) {
            return new JsonResponse([
                'error' => 'Unauthrized',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return new JsonResponse([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $ttl,
        ], Response::HTTP_OK);
    }
}