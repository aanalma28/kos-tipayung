<?php


use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\DashboardController;
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


Route::get('/owner', function () {
    return view('owner');
});

// user route
Route::resource('/user', UserController::class);

// room route
// Route::resource('', RoomController::class);

// income route
// Route::resource('', IncomeController::class);

// outcome route
// Route::resource('', OutcomeController::class);

// register room
Route::post('/register-room', [RegisterRoomController::class, 'create']);
Route::get('/detail', [RegisterRoomController::class, 'index']);

// login route
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// dashboard controller
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/test', function(){
    User::create([
         'role' => 'sdfsdf',
         'name' => 'dfgdgd',
         'username' => 'sdfghf',
         'email' => 'hjgjgm',
         'password' => 'werg',
         'phone' => 'fgtyfg'
   ]);
});
