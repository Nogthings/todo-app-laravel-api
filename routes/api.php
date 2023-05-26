<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskGroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();

    Route::post('/logout', [AuthController::class, 'logout']);

});

Route::apiResource('/taskgroup', TaskGroupController::class);
Route::apiResource('/tasks', TaskController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::put('/delete/{id}', [TaskController::class, 'updateStatus']);
Route::put('/done/{id}', [TaskController::class, 'updateComplete']);