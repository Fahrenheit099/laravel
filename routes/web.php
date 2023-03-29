<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthenticateController::class)->group(function () {
    Route::get('/auth', function () {
        return view('auth.auth');
    })->name('auth_index');
    Route::post('/auth', 'login')->name('auth_login');
    Route::get('/registration', function () {
        return view('auth.reg');
    })->name('reg_form');
    Route::post('/registration', 'store')->name('reg_user');
    Route::get('/logout', function() {
        Auth::logout();
        return redirect('/auth');
    })->name('logout');
});

Route::resource('todolist', ToDoController::class)->middleware('auth');

Route::get('/', function (){
    return redirect()->route('todolist.index');
});
