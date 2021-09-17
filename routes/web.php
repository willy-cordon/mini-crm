<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth'], 'prefix' => 'profile', 'as' => 'admin.'], function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);

    Route::get('employees/filter',[EmployeeController::class,'index'])->name('employees.filter');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

