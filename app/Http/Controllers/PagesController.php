<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // controller for the login page to route.
    public function login(){
        return view('pages.login');
    }
}
