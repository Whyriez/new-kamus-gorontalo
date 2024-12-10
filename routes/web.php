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

//                ==== AUTH ====
Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('auth.proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', [UserController::class, 'viewWelc'])->name('welcome');
Route::get('/search', [UserController::class, 'search'])->name('search');
Route::get('/kata/{id}', [UserController::class, 'getById'])->name('kata.getById');
Route::get('/register', [UserController::class, 'viewRegister'])->name('viewRegister');
Route::get('/adminSidebar', [UserController::class, 'adminSidebar'])->name('adminSidebar');
Route::get('/register_pending', [UserController::class, 'afterRegister'])->name('afterRegister');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [UserController::class, 'viewDashboard'])->name('dashboard');
    Route::get('/daftar_kata', [UserController::class, 'viewDaftarKata'])->name('daftarKata');
    Route::get('/kelola_editor', [UserController::class, 'viewAturEditor'])->name('aturEditor');
    Route::get('/create_kata', [UserController::class, 'formCreateKata'])->name('formCreateKata');
    Route::post('/simpan_kata', [UserController::class, 'simpanKata'])->name('simpanKata');
    Route::get('/delete/kata/{id}', [UserController::class, 'deleteKata'])->name('deleteKata');
    





});

