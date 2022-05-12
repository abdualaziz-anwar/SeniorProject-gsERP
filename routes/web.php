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

Route::group(['middleware' => 'auth'], function () {

    // Admin dashBoard
    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/m-dashboard', [\App\Http\Controllers\AdminController::class, 'm_dashboard'])->name('m-dashboard');

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

    // contracts Routing
    Route::get('/contracts-management', [\App\Http\Controllers\ContractsManagementController::class, 'getListing'])->name('contracts');
    Route::post('/submitAddContractForm', [\App\Http\Controllers\ContractsManagementController::class, 'submitAddForm'])->name("submitAddContractForm");
    Route::post('/deleteContracts', [\App\Http\Controllers\ContractsManagementController::class, 'deleteItem'])->name('deleteContracts');
    Route::post('/submitEditContractForm', [\App\Http\Controllers\ContractsManagementController::class, 'submitEditForm'])->name('submitEditContractForm');
    Route::post('/populateEditContractsForm', [\App\Http\Controllers\ContractsManagementController::class, 'populateEditForm'])->name('populateEditContractsForm');
    // ##contracts Routing

    //employee
    Route::get('/employee-management', [\App\Http\Controllers\EmployeeManagmenetController::class, 'getListing'])->name('employee-management');
    Route::post('/submitAddEmployeeForm', [\App\Http\Controllers\EmployeeManagmenetController::class, 'submitAddForm'])->name("submitAddEmployeeForm");
    Route::post('/deleteEmployee', [\App\Http\Controllers\EmployeeManagmenetController::class, "deleteItem"])->name('deleteEmployee');
    Route::post('/submitEditEmployeeForm', [\App\Http\Controllers\EmployeeManagmenetController::class, 'submitEditForm'])->name('submitEditEmployeeForm');
    Route::post('/populateEditEmployeeForm', [\App\Http\Controllers\EmployeeManagmenetController::class, 'populateEditForm'])->name('populateEditEmployeeForm');

    //employee Report
    Route::get('/employee-report', [\App\Http\Controllers\EmployeeReportManagmentController::class, 'getListing'])->name('employee-report');
    Route::post('/submitAddEmployeeReportForm', [\App\Http\Controllers\EmployeeReportManagmentController::class, 'submitAddForm'])->name('submitAddEmployeeReportForm');
    Route::post('/deleteEmployeeReport', [\App\Http\Controllers\EmployeeReportManagmentController::class, 'deleteItem'])->name('deleteEmployeeReport');
    Route::post('/populateEditEmployeeReportForm', [\App\Http\Controllers\EmployeeReportManagmentController::class, 'populateEditForm'])->name('populateEditEmployeeReportForm');
    Route::post('/submitEditEmployeeReportForm', [\App\Http\Controllers\EmployeeReportManagmentController::class, 'submitEditForm'])->name('submitEditEmployeeReportForm');
    //##employee Report

    //admin employye report
    Route::get('/admin-employee-report', [\App\Http\Controllers\AdminEmployeeReportManagementController::class, 'getListing'])->name('admin-employee-report');
    Route::get('/admin-employee-report/{emp_id}', [\App\Http\Controllers\AdminEmployeeReportManagementController::class, 'getSingleEmployeeReport'])->name('singleEmployeeReport');
    //Route::post('/submitAddEmployeeReportForm', [\App\Http\Controllers\AdminEmployeeReportManagementController::class, 'submitAddForm'])->name('submitAddEmployeeReportForm');
    //Route::post('/deleteEmployeeReport', [\App\Http\Controllers\AdminEmployeeReportManagementController::class, 'deleteItem'])->name('deleteEmployeeReport');
    //Route::post('/populateEditEmployeeReportForm', [\App\Http\Controllers\AdminEmployeeReportManagementController::class, 'populateEditForm'])->name('populateEditEmployeeReportForm');
    //Route::post('/submitEditEmployeeReportForm', [\App\Http\Controllers\AdminEmployeeReportManagementController::class, 'submitEditForm'])->name('submitEditEmployeeReportForm');

    Route::get('/downloadReport', [\App\Http\Controllers\AdminEmployeeReportManagementController::class, 'downloadReport'])->name('downloadReport');
    //##admin employye report

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

\Illuminate\Support\Facades\Auth::routes();
