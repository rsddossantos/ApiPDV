<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;

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
 * ROUTES FOR USERCONTROLLER
 *
 * @params: name, email, password
 * @validation: all required / email valid and nonexistent
 */
Route::post('/user', [AuthController::class, 'create']);

/*
 * @params: token
 */
Route::get('/user', [UserController::class, 'list']);

/*
 * @params: token, id user
 */
Route::get('/user/update/{id}', [UserController::class, 'one']);

/*
 * @params: token, name, email, password
 * @validation: token, email valid and nonexistent
 */
Route::post('/user/update', [UserController::class, 'update']);

/*
 * @params: token, id user
 */
Route::post('/user/delete/{id}', [UserController::class, 'delete']);
/*
 * @params: token
 */
Route::post('/user/import', [UserController::class, 'import']);

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
 * ROUTES FOR DEPARTMENTCONTROLLER
 *
 * @params: token, name,
 * @validation: all required / email valid and nonexistent
 */
Route::post('/department', [DepartmentController::class, 'create']);

/*
 * @params: token
 */
Route::get('/department', [DepartmentController::class, 'list']);
/*
 * @params: token, id
 */
Route::get('/department/update/{id}', [DepartmentController::class, 'one']);

/*
 * @params: token, name
 */
Route::post('/department/update', [DepartmentController::class, 'update']);
/*
 * @params: token, id user
 */
Route::post('/department/delete/{id}', [DepartmentController::class, 'delete']);




/*
 * Internal Control
 */
Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');





