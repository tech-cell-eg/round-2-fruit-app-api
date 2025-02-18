<?php

namespace App\Traits;

trait ApiResponse
{

    public function successResponse($data, $message = 'Operation successful', $code = 200) {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function errorResponse($message = 'Operation failed', $code = 500) {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }

}
