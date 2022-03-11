<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/autenticate',[AuthController::class,'authenticate'])->name('autenticate');
Route::post('/registered',[AuthController::class,'registered'])->name('registered');
Route::get('/',[HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    //logout
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');

    // Route::get('/dashboard',[HomeController::class, 'dashboard'])->name('dashboard');

    //admin
    Route::middleware('role:admin')->group(function(){
            Route::get('/admin/dashboard',[HomeController::class, 'dashboard'])->name('admin.dashboard');

    });
    //user
    Route::middleware('role:User')->group(function(){
            Route::get('/user/dashboard',[HomeController::class, 'dashboard'])->name('user.dashboard');

    });
    //student
    Route::middleware('role:Student')->group(function(){
            Route::get('/student/dashboard',[HomeController::class, 'dashboard'])->name('student.dashboard');

    });
});

