<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($message = 'Success',  $data = [], $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
            'status_code' => $statusCode
        ], $statusCode);
    }

    public static function error($message = 'An error occurred', $statusCode = 400, $data = [])
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data,
            'status_code' => $statusCode
        ], $statusCode);
    }
}
