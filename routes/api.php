<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// It´s works?
Route::get('/ping', function() {
    return ['pong'=>true];
});

/*
 * @params: name, email, password
 * @validation: all required / email valid and nonexistent
 */
Route::post('/user', [AuthController::class, 'create']);

/*
 * @params: token
 */
Route::get('/user', [UserController::class, 'list']);

/*
 * @params: token, name, email, password
 * @validation: token, email valid and nonexistent
 */
Route::post('/user/update', [UserController::class, 'update']);

/*
 * @params: token
 */
Route::get('/user/delete/{id}', [UserController::class, 'delete']);

/*
 * @params: email, password
 */
Route::post('/auth/login', [AuthController::class, 'login']);

/*
 * @params: token
 */
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::post('/auth/refresh', [AuthController::class, 'refresh']);

/*
 * Internal Control
 */
Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');





