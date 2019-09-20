<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function apiResponse($resultType, $data, $message = null, $code = 200)
    {
        $response = [];
        $response['success'] = $resultType == ResultType::Success ? true : false;
    
        if (isset($data)) {
            if ($resultType != ResultType::Error) {
                $response['data'] = $data;
            }
    
            if ($resultType == ResultType::Error) {
                $response['errors'] = $data;
            }
        }
    
        if (isset($message)) {
            $response['message'] = $message;
        }
        
        return response()->json($response, $code);
    }
}

class ResultType
{
    const Success = 1;
    const Information = 2;
    const Warning = 3;
    const Error = 4;
}
