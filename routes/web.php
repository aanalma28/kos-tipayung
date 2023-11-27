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
use App\Http\Controllers\AkunsetController;

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
    return view('guest.landing',[
        'datas' => Room::all(),
    ]);
});

Route::get('/owner/perhitungan', function () {
    return view('owner.addkeuangan');
});
Route::get('/owner/laporan-keuangan', function () {
    return view('owner.laporan');
});

Route::get('/pengajuan', function () {
    return view('guest.pengajuan');
});
Route::get('/py', function () {
    return view('penyewa.akunpy');
});
// user route
// route ini digunakan untuk handle halaman CRUD user di dashboard owner
// jadi halaman CRUD dalam satu route
// BERIKUT ADALAH FORMAT DARI URL ROUTE RESOURCE:
// url /user -> menampilkan halaman dari semua data user
// url /user/create -> menampilkan halaman form buat user
// url /user/{idspesifik} -> menampilkan form halaman edit user jika user di klik
Route::resource('/user', UserController::class)->middleware('owner');

// room route
// kalo resource handle halaman CRUD dalam satu route
Route::resource('/room', RoomController::class)->middleware('owner');


// register room
Route::post('/register-room', [RegisterRoomController::class, 'create']);
Route::get('/register-room/{room:id}/detail', [RegisterRoomController::class, 'index']);

// login route
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// dashboard controller
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('dashboard');
Route::post('/dashboard/{user:id}/accept', [DashboardController::class, 'accept'])->middleware('owner');
Route::post('/dashboard/{user:id}/decline', [DashboardController::class, 'decline'])->middleware('owner');
Route::post('/dashboard/{user:id}/delete', [DashboardController::class, 'delete'])->middleware('owner');

// tabungan controller
Route::post('/tabungan/{tabungan:id}/edit',[TabunganController::class, 'update']);
Route::post('/tambahtabungan',[TabunganController::class, 'create']);

Route::post('/{tabungan:id}/hapustabungan',[TabunganController::class, 'destroy']);

Route::post('/hapustabungan',[TabunganController::class, 'destroy']); //belumbisa

// Route to show user account
Route::get('/akun', [AkunsetController::class, 'showAccount'])->name('akun.show');

// Route to update user account
Route::post('/akun/update', [AkunsetController::class, 'updateAccount'])->name('akun.update');

