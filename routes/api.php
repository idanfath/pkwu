<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::delete('/delete/{id}', [UserController::class, 'delete']);
Route::get('/fetch/{id}', [UserController::class, 'fetchid']);
// Route::put('/update', [UserController::class, 'update']);
Route::get('/fetchall', [UserController::class, 'fetchall']);
Route::post('/add', [UserController::class, 'create']);