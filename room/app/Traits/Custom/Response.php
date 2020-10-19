<?php
namespace App\Traits\Custom;

trait Response
{
    public function successResponse($data = [], $message = null, $code = 200)
    {
        return response()->json([
            "data" => $data,
            "message" => $message,
        ], $code);
    }
    public function faliedResponse($data = null, $message = null, $code = 400)
    {
        return response()->json([
            "data" => $data,
            "message" => $message,
        ], $code);
    }
}
