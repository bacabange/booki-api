<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;

class UserController extends Controller
{
    public function listBooks()
    {
        $user = \Auth::user();

        return new BookCollection($user->books()->paginate());
    }
}
