<?php

namespace App\Http\Controllers\Api;

use App\Recipes;
use App\Univers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	public function nameReturn(Request $request){
		$user = User::nameReturn($request->user_id);
		return $user ? $user : null;
	}
}
