<?php

namespace App\Http\Controllers;

use http\Exception;

class DesignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            return view('design.atom');
        } catch (Exception $e) {
            report($e);
        }

        return view('design.atom');
    }
}
