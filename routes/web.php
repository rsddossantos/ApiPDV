<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::prefix('/')->group(function() {

    Route::get('/', function () {
        return view('login');
    });

    Route::get('/api/web/login', function () {
        return view('login');
    });

    Route::get('/api/web/register', function () {
        return view('register');
    });

    Route::get('/api/web/user', function () {
        return view('user');
    });
    Route::get('/api/web/userCreate', function () {
        return view('userCreate');
    });
    Route::post('/api/web/userCreateAction', function () {
        return view('userCreate');
    });
    Route::get('/api/web/userUpdate', function () {
        return view('userUpdate');
    });






    Route::get('/api/web/department', function () {
        return view('department');
    });

});