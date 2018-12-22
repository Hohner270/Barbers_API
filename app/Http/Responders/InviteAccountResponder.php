<?php

namespace App\Http\Responders;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class InviteAccountResponder
{
    /**
     * @param bool 招待メールが送信されたか
     * @return JsonResponse
     */
    public function __invoke(bool $isSent): JsonResponse
    {
        if (! $isSent) {
            return new JsonResponse(
                [
                    'error' => 'failed to send invite mail',
                ], 
                Response::HTTP_BAD_REQUEST
            );
        }

        return new JsonResponse(
            [], 
            Response::HTTP_NO_CONTENT
        );
    }
}