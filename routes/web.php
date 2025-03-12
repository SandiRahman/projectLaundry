<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginOwnerController;
use App\Http\Controllers\Owner\DashboardOwnerController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterKhususController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanKasirController;

// Route untuk halaman utama
Route::get('/', function () {
    return view('landing');
});

// Route untuk autentikasi umum
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    
    Route::get('/registerkhusus', [RegisterKhususController::class, 'showRegistrationKhususForm'])->name('registerkhusus');
    Route::post('/registerkhusus', [RegisterKhususController::class, 'registerkhusus']);
    
    Route::get('/loginowner', [LoginOwnerController::class, 'showLoginForm'])->name('owner.login');
    Route::post('/loginowner', [LoginOwnerController::class, 'login']);
});

// Route untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logoutowner', [LoginOwnerController::class, 'logout'])->name('owner.logout');

// Route untuk dashboard pengguna
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Route untuk dashboard admin
Route::middleware('auth')->group(function () {
    Route::get('/admindashboard', [DashboardController::class, 'adminDashboard'])->name('admindashboard');
});

// Route untuk dashboard owner
Route::middleware('auth')->group(function () {
    Route::get('/dashboardowner', [DashboardOwnerController::class, 'index'])->name('owner.dashboard');
});

// Route untuk CRUD Paket
Route::middleware('auth')->group(function () {
    // Menampilkan daftar paket
    Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');

    // Menampilkan form tambah paket
    Route::get('/paket/create', [PaketController::class, 'create'])->name('paket.create');

    // Menyimpan paket baru
    Route::post('/paket', [PaketController::class, 'store'])->name('paket.store');

    // Menampilkan form edit paket
    Route::get('/paket/{paket}/edit', [PaketController::class, 'edit'])->name('paket.edit');

    // Mengupdate paket
    Route::put('/paket/{paket}', [PaketController::class, 'update'])->name('paket.update');

    // Menghapus paket
    Route::delete('/paket/{paket}', [PaketController::class, 'destroy'])->name('paket.destroy');
});

// Route untuk CRUD Outlet
Route::middleware('auth')->group(function () {
    Route::resource('outlet', OutletController::class);
});

// Route untuk CRUD User
Route::middleware('auth')->group(function () {
    Route::resource('user', UserController::class);
});

// Route untuk Transaksi
Route::middleware('auth')->group(function () {
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
});

// Route untuk Laporan Kasir
Route::middleware('auth')->group(function () {
    Route::get('/laporankasir', [LaporanKasirController::class, 'index'])->name('laporankasir.index');
    Route::get('/laporankasir/pdf', [LaporanKasirController::class, 'downloadPDF'])->name('laporankasir.pdf');
});

// Menambahkan fitur autentikasi Laravel
Auth::routes(['verify' => true]);