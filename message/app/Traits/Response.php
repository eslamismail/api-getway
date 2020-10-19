<?php
namespace App\Traits;

trait Response
{
    public function successResponse($data = null, $message = null, $code = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public function failedResponse($data = null, $message = null, $code = 400)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
