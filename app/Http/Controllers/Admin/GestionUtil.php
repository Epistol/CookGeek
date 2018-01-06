<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GestionUtil extends Controller
{
    //

    public function index(){
        $users = DB::table('users')->latest()->paginate(10);
        return view("admin.users.index", array(
            'users' => $users
        ));
    }
}
