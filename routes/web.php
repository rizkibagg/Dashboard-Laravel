<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;

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
    return view('Dashboard.login',[
        "title" => "Login"
    ]);
});

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'createus'])->name('createus');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login_action');
Route::get('about', [UserController::class, 'password'])->name('password');
Route::post('about', [UserController::class, 'password_action'])->name('password_action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function(){

    Route::get('home', function () {
        return view('Dashboard.home',[
            "title" => "Dashboard"
        ]);
    });

    Route::get('about', function () {
        return view('Dashboard.about',[
            "title" => "About"
        ]);
    });

    Route::get('datamhs', [MahasiswaController::class, 'index'])->name('datamhs');
    Route::get('datads', [DosenController::class, 'index'])->name('datads');

    Route::get('createmhs', [MahasiswaController::class, 'create'])->name('createmhs');
    Route::get('createds', [DosenController::class, 'create'])->name('createds');

    Route::post('savemhs', [MahasiswaController::class, 'store'])->name('savemhs');
    Route::post('saveds', [DosenController::class, 'store'])->name('saveds');

    Route::get('editmhs/{nim}', [MahasiswaController::class, 'edit']);
    Route::get('editds/{nik}', [DosenController::class, 'edit']);

    Route::post('updatemhs/{nim}', [MahasiswaController::class, 'update'])->name('updatemhs');
    Route::post('updateds/{nik}', [DosenController::class, 'update'])->name('updateds');

    Route::get('deletemhs/{nim}', [MahasiswaController::class, 'destroy'])->name('deletemhs');
    Route::get('deleteds/{nik}', [DosenController::class, 'destroy'])->name('deleteds');
});

