<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Return a default response for api
 *
 * @param string $message
 * @param string $code
 * @param int $status_code
 * @param array $additional
 * @return JsonResponse
 */
if(!function_exists('default_response')) {
    function default_response(
        string $message,
        string $code,
        int $status_code,
        array $additional = []
    ): JsonResponse
    {
        return response()->json(
            array_merge([
                'status' => $status_code,
                'code' => $code,
                'message' => $message,
            ], $additional),
            $status_code
        );
    }
}


/**
 * Return a default response for api with token
 *
 * @param string $token
 * @return JsonResponse
 */
if(!function_exists('token_response')) {
    function token_response(
        string $token,
    ): JsonResponse
    {
        return response()->json([
            "access" => $token,
            "refresh" => $token,
            "token_type" => "bearer",
            "expires_in" => Auth::factory()->getTTL() * 60
        ]);
    }
}
