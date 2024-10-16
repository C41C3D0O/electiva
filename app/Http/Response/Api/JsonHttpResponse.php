<?php
namespace App\Http\Response\Api;

use Illuminate\Http\JsonResponse;

class JsonHttpResponse{

    public static function successResponse($data, String $status, Int $code = 200): JsonResponse{
        return response()->json(
            [
                'data'=>$data,
                'status'=>$status
            ],
            $code
        );
    }

    public static function errorResponse(String $message, String $status, Int $code = 500): JsonResponse{
        return response()->json(
            [
                'message'=>$message,
                'status'=>$status
            ],
            $code
        );
    }
}