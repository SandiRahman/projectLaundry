<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route untuk login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'showDashboardForm'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'dashboard']);

// Menggunakan AuthController (jika masih dibutuhkan)
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Menambahkan fitur autentikasi Laravel
Auth::routes(['verify' => true]);

// Route untuk home setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');
