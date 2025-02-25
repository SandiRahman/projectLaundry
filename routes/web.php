<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginOwnerController;
use App\Http\Controllers\Owner\DashboardOwnerController;

use App\Http\Controllers\Auth\PaketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterKhususController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanKasirController;

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/dashboard', [DashboardController::class, 'showDashboard']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'showDashboardForm'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'dashboard']);


Route::get('/admindashboard', [DashboardController::class, 'adminDashboard'])->name('admindashboard');
Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');

Route::get('/outlet/{id}/edit', [OutletController::class, 'edit'])->name('outletedit');
Route::put('/outlet/{id}', [OutletController::class, 'update'])->name('outlet.update');

// Menggunakan AuthController (jika masih dibutuhkan)
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/loginowner', [LoginOwnerController::class, 'showLoginForm'])->name('owner.login');
Route::post('/loginowner', [LoginOwnerController::class, 'login']);
Route::post('/logoutowner', [LoginOwnerController::class, 'logout'])->name('owner.logout');

// Route untuk dashboard owner
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboardowner', function () {
        return view('owner.dashboardowner');
    })->name('owner.dashboard');
});

Route::get('/dashboardowner', [DashboardOwnerController::class, 'index'])->name('dashboard.owner');


// Menambahkan fitur autentikasi Laravel
Auth::routes(['verify' => true]);

// Route untuk home setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route untuk ke paket
Route::get('/paket', [PaketController::class, 'showForm'])->name('paket');
Route::post('/paket', [PaketController::class, 'store'])->name('paket.store');

// Route buat ke admin dashboard
Route::get('/admin-dashboard', [UserController::class, 'index'])->name('admin.dashboard');

// Route buat register khusus
Route::get('/registerkhusus', [RegisterKhususController::class, 'showRegistrationKhususForm'])->name('registerkhusus');
Route::post('/registerkhusus', [RegisterKhususController::class, 'registerkhusus']);

// Route buat outlet
Route::get('outlet', [OutletController::class, 'index'])->name('outlet.index');
Route::post('outlet', [OutletController::class, 'store'])->name('outlet.store');
Route::put('outlet/{id}', [OutletController::class, 'update'])->name('outlet.update');
Route::delete('outlet/{id}', [OutletController::class, 'destroy'])->name('outlet.destroy');

// Route buat transaksi
Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

// Route buat laporankasir
Route::get('/laporankasir', [LaporanKasirController::class, 'index'])->name('laporankasir.index');
