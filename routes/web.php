<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('auth.proses_login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/tambahKata', [UserController::class, 'viewTambahKata'])->name('tambahKata');
    // Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
    // Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
    // Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
});


Route::get('/', [UserController::class, 'viewWelc'])->name('welcome');

// Route::get('/ubahkata', function () {
//     return view('admin/ubahkata');
// });

// Route::get('/', [UserController::class, 'viewPenelitian'])->name('penelitian');
// Route::get('/penelitian', [UserController::class, 'viewPenelitian'])->name('penelitian');
// Route::get('/profil', [UserController::class, 'viewProfil'])->name('profil');
// Route::get('/login', function () {
//     return view('auth/login');
// });