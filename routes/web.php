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

    /*
     * USERS
     */

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
    Route::get('/api/web/userUpdate', function () {
        return view('userUpdate');
    });
    Route::get('/api/web/userDelete', function () {
        return view('userDelete');
    });
    Route::get('/api/web/importCSV', function () {
        return view('import');
    });


    /*
     * DEPARTMENTS
     */
    Route::get('/api/web/department', function () {
        return view('department');
    });
    Route::get('/api/web/departmentCreate', function () {
        return view('departmentCreate');
    });
    Route::get('/api/web/departmentUpdate', function () {
        return view('departmentUpdate');
    });
    Route::get('/api/web/departmentDelete', function () {
        return view('departmentDelete');
    });



});