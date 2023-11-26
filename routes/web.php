<?php


use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterRoomController;
use App\Http\Controllers\TabunganController;

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
    return view('landing');
});

Route::get('/owner', function () {
    return view('owner');
});

Route::get('/owner/perhitungan', function () {
    return view('addkeuangan');
});
Route::get('/owner/laporan-keuangan', function () {
    return view('laporan');
});

Route::get('/pengajuan', function () {
    return view('pengajuan');
});
Route::get('/ca', function () {
    return view('createaccount');
});

// user route
// route ini digunakan untuk handle halaman CRUD user di dashboard owner
// jadi halaman CRUD dalam satu route
// BERIKUT ADALAH FORMAT DARI URL ROUTE RESOURCE:
// url /user -> menampilkan halaman dari semua data user
// url /user/create -> menampilkan halaman form buat user
// url /user/{idspesifik} -> menampilkan form halaman edit user jika user di klik
Route::resource('/user', UserController::class);

// room route
// kalo resource handle halaman CRUD dalam satu route
Route::resource('/room', RoomController::class);


// register room
Route::post('/register-room', [RegisterRoomController::class, 'create']);
Route::get('/detail', [RegisterRoomController::class, 'index']);

// login route
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// dashboard controller
Route::get('/dashboard', [DashboardController::class, 'index']);

// tabungan controller
Route::get('/penyewa',[TabunganController::class, 'index']);
Route::post('/tambahtabungan',[TabunganController::class, 'create']);
Route::post('/hapustabungan',[TabunganController::class, 'destroy']); //belumbisa
