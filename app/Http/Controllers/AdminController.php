<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function dashboard()
    {
        $data = [
            'slug' => 'dashboard'
        ];
        return view('dashboard', $data);
    }

    function m_dashboard()
    {
        $data = [
            'slug' => 'm-dashboard'
        ];
        return view('m-dashboard', $data);
    }
}
