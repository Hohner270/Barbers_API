<?php

namespace App\Http\Responders\Stylists;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use App\Domains\Models\Account\Stylist\Stylist;

class CreateStylistResponder
{
    /**
     * @param Stylist Accountインターフェイス継承クラス | NULL
     * @return JsonResponse
     */
    public function __invoke(?Stylist $stylist): JsonResponse
    {
        if (! $stylist) {
            return new JsonResponse(
                [
                    'message' => 'failed to create stylist account',
                ], 
                Response::HTTP_BAD_REQUEST
            );
        }

        return new JsonResponse(
            $stylist->toArray(),
            Response::HTTP_CREATED
        );
    }
}