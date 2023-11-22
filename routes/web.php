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
    return view('index');
});

// user route
Route::resource('', UserController::class);

// room route
Route::resource('', RoomController::class);

// income route
Route::resource('', IncomeController::class);

// outcome route
Route::resource('', OutcomeController::class);
