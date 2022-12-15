<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingUserController;
use App\Http\Controllers\SettingUsersController;
use App\Http\Controllers\UserApiController;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('app.home');
    
    Route::resource('user', SettingUsersController::class);
    Route::get('/api/user/frontend', [UserApiController::class, 'index'])->name('user-api-frontend');
    // Route::resource('product-stock', UserController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
