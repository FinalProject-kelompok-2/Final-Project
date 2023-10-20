<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function landing() {
        return view('user.landing');
    }

    function home() {
        return view('user.home');
    }
}
