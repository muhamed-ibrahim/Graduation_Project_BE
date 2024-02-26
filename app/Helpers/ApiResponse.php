<?php

namespace App\Helpers;

class ApiResponse
{
    static function sendResponse($code = 200, $msg = null, $data = null)
    {
        $response = [
            'status'    => $code,
            'message'       => $msg,
            'data'      => $data,
        ];

        return response()->json($response, $code);
    }
}
