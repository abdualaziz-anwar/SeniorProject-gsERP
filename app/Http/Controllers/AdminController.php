<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function dashboard(){
        $data = [
            'slug' => 'dashboard'
        ];
        return view('dashboard' , $data);
    }
}
