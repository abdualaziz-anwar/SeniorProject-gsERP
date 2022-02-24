<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin dashBoard
Route::get('/' , function(){
    return redirect('/dashboard');
});
Route::get('/dashboard' , [\App\Http\Controllers\AdminController::class , 'dashboard']) ->name('dashboard');



Route::get('/propertyManagment' , 'PagesController@propertyManagment');

Route::get('/gasStationManagment' , 'PagesController@gasStationManagment');
