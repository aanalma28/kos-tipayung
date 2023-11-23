<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\RegisterRoomController;

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

Route::get('/detail', function () {
    return view('detail');
});

// user route
// Route::resource('', UserController::class);

// room route
// Route::resource('', RoomController::class);

// income route
// Route::resource('', IncomeController::class);

// outcome route
// Route::resource('', OutcomeController::class);

// register room
Route::get('/register-room', [RegisterRoomController::class, 'create']);
Route::post('/register-room', [RegisterRoomController::class, 'index']);

// login route
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// dashboard controller
Route::get('/dashboard', [DashboardController::class, 'index']);
