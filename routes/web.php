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
Route::get('/', function () {
    return redirect('/dashboard');
});
Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');

// Property managment Routing
Route::get('/property-managment', [\App\Http\Controllers\PropertyManagmentController::class, 'getListing'])->name('property-managment');
Route::post('/submitAddPropertForm', [\App\Http\Controllers\PropertyManagmentController::class, 'submitAddPropertForm'])->name('submitAddPropertForm');
Route::post('/submitEditPropertForm', [\App\Http\Controllers\PropertyManagmentController::class, 'submitEditPropertForm'])->name('submitEditPropertForm');
Route::post('/deletePropert', [\App\Http\Controllers\PropertyManagmentController::class, 'deletePropert'])->name('deletePropert');
Route::post('/populateEditPropertForm', [\App\Http\Controllers\PropertyManagmentController::class, 'populateEditPropertForm'])->name('populateEditPropertForm');
// ##Property managment Routing

// gsm-management routing


Route::get('/gsm-managment', [\App\Http\Controllers\GasStationManagerManagementController::class, 'getListing'])->name('gsm');
Route::post('/submitAddGasStationManagerForm', [\App\Http\Controllers\GasStationManagerManagementController::class, 'submitAddForm'])->name('submitAddGasStationManagerForm');
Route::post('/deleteGasStationManager', [\App\Http\Controllers\GasStationManagerManagementController::class, 'deleteItem'])->name('deleteGasStationManager');
Route::post('/populateEditGasStationManagerForm', [\App\Http\Controllers\GasStationManagerManagementController::class, 'populateEditForm'])->name('populateEditGasStationManagerForm');
Route::post('/submitEditGasStationManagerForm', [\App\Http\Controllers\GasStationManagerManagementController::class, 'submitEditForm'])->name('submitEditGasStationManagerForm');
// ##gsm-management routing

// LeasHolder Routing
Route::get('/Leaseholder-management', [\App\Http\Controllers\LeaseholderManagementController::class, 'getListing'])->name('leaseholder-management');
Route::post('/submitAddLeaseholderForm', [\App\Http\Controllers\LeaseholderManagementController::class, 'submitAddForm'])->name('submitAddLeaseholderForm');
Route::post('/deleteLeaseholder', [\App\Http\Controllers\LeaseholderManagementController::class, 'deleteItem'])->name('deleteLeaseholder');
Route::post('/populateEditLeaseholderForm', [\App\Http\Controllers\LeaseholderManagementController::class, 'populateEditForm'])->name('populateEditLeaseholderForm');
Route::post('/submitEditLeaseholderForm', [\App\Http\Controllers\LeaseholderManagementController::class, 'submitEditForm'])->name('submitEditLeaseholderForm');

// ##LeasHolder Routing


// Route::get('/propertyManagment' , 'PagesController@propertyManagment');

// Route::get('/gasStationManagment' , 'PagesController@gasStationManagment');
