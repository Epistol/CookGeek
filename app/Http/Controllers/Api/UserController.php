<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function nameReturn(Request $request)
    {
        $user = User::nameReturn($request->user_id);

        return $user ? $user : null;
    }
}
