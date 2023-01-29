<?php

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

Route::get('/data', 'App\Http\Controllers\MahasiswaController@index')->name('data');
Route::get('/datads', 'App\Http\Controllers\DosenController@index')->name('datads');

Route::get('/create', 'App\Http\Controllers\MahasiswaController@create')->name('create');
Route::get('/createds', 'App\Http\Controllers\DosenController@create')->name('createds');

Route::post('/save', 'App\Http\Controllers\MahasiswaController@store')->name('save');
Route::post('/saveds', 'App\Http\Controllers\DosenController@store')->name('saveds');

Route::get('/{nim}', 'App\Http\Controllers\MahasiswaController@edit')->name('edit');
Route::get('/edit/{nik}', 'App\Http\Controllers\DosenController@edit')->name('edit');

Route::post('/update/{nim}', 'App\Http\Controllers\MahasiswaController@update')->name('update');
Route::post('/updateds/{nik}', 'App\Http\Controllers\DosenController@update')->name('updateds');

Route::get('/delete/{nim}', 'App\Http\Controllers\MahasiswaController@destroy')->name('delete');
Route::get('/deleteds/{nim}', 'App\Http\Controllers\DosenController@destroy')->name('deleteds');



