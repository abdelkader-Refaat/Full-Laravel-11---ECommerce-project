<?php

if (!function_exists('sendResponse')) {
    function sendResponse(array $data, int $code, string $message = null, bool $hasError = false)
    {
        $responseMessage = [
            200 => 'Success' , 201 => 'Created',401 => 'UnAuthurized Access' ,
             403 => 'Not Allowed' , 404 => 'Not Found' , 500 => 'Internal Server Error'
        ];
        return response()->json([
            'status' => [
                'code' => $code,
                'mesaage' => $message ?? $responseMessage[$code],
                'error' => $hasError,
            ],
            'data' => $data,
        ], $code);
    }
}
