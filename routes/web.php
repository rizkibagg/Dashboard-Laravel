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

Route::get('/home', function () {
    return view('Dashboard.home',[
        "title" => "Dashboard"
    ]);
});

Route::get('/about', function () {
    return view('Dashboard.about',[
        "title" => "About"
    ]);
});

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'createus'])->name('createus');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login_action');
Route::get('about', [UserController::class, 'password'])->name('password');
Route::post('about', [UserController::class, 'password_action'])->name('password_action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('data', [MahasiswaController::class, 'index'])->name('data');
Route::get('datads', [DosenController::class, 'index'])->name('datads');

Route::get('create', [MahasiswaController::class, 'create'])->name('create');
Route::get('createds', [DosenController::class, 'create'])->name('createds');

Route::post('save', [MahasiswaController::class, 'store'])->name('save');
Route::post('saveds', [DosenController::class, 'store'])->name('saveds');

Route::get('{nim}', [MahasiswaController::class, 'edit'])->name('edit');
Route::get('edit/{nik}', [DosenController::class, 'edit'])->name('edit');

Route::post('update/{nim}', [MahasiswaController::class, 'update'])->name('update');
Route::post('updateds/{nik}', [DosenController::class, 'update'])->name('updateds');

Route::get('delete/{nim}', [MahasiswaController::class, 'destroy'])->name('delete');
Route::get('deleteds/{nik}', [DosenController::class, 'destroy'])->name('deleteds');

