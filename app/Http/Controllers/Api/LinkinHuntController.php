<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkinHuntController extends Controller
{
    public function getUrlData(Request $request)
    {
        return \UrlHelper::get_metadata($request->get('url'));
    }
}
