<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    // 'register' => false, 
    // 'reset' => false,
    'verify' => false,
]);

Route::group(['middleware' => ['App\Http\Middleware\AdminCheck']], function () {
    Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
});
