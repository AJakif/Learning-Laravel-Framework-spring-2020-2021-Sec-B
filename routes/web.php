<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

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


Route::post('/auth/save',[MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check',[LoginController::class, 'check'])->name('auth.check');
Route::get('/auth/logout',[LogoutController::class, 'logout'])->name('auth.logout');

Route::get('/login',[LoginController::class, 'login'])->name('login.index');

Route::get('/register',[MainController::class, 'register'])->name('reg.register');

Route::group(['middleware'=>['AuthCheck']], function(){ 
    Route::post('/login', [LoginController::class,'check']);

    //Customer Routing
    Route::get('/user/dashboard',[CustomerController::class, 'userdashboard']);
    Route::get('/user/settings',[CustomerController::class,'usersettings']);
    Route::get('/user/profile',[CustomerController::class,'userprofile']);

    //Admin Routing
    Route::get('/admin/dashboard',[AdminController::class, 'admindashboard']);
    Route::get('/admin/settings',[AdminController::class,'adminsettings']);
    Route::get('/admin/profile',[AdminController::class,'adminprofile']);

    //account routing
    Route::get('/account/dashboard',[AccountController::class, 'accountdashboard']);

    //employee routing
    Route::get('/employee/dashboard',[EmployeeController::class, 'employeedashboard']);

    //delete
    Route::get('/delete/{id}', [MainController::class,'delete'])->name('user.delete');
    Route::post('/delete/{id}', [MainController::class,'destroy']);
    
});