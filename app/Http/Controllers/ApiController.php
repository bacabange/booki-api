<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $codeSuccess = 200;
    protected $codeError = 401;
    protected $codeNotFound = 404;

    public function responseSuccess($message, $data = [])
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message
        ], $this->codeSuccess);
    }

    public function responseError($message, $errors = [])
    {
        return response()->json([
            'success' => true,
            'errors' => $errors,
            'message' => $message
        ], $this->codeError);
    }
}
