<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('web');
    }

    public function dashboard()
    {
        return view('layouts/main_template');
    }
}
