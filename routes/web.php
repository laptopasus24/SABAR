<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

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
//     return view('layouts.master');
// });

Route::get('/', function () {
    return redirect()->route('login');  // Mengarahkan ke halaman login
});

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
// Route untuk dashboard peternak
// Route::get('/peternak/dashboard', [DashboardController::class, 'peternakDashboard'])->name('peternak.dashboard')->middleware('auth', 'role:peternak');

// Route untuk peternak
Route::middleware(['auth', 'role:peternak'])->group(function () {
    Route::get('/peternak/dashboard', [DashboardController::class, 'peternakDashboard'])->name('peternak.dashboard');
});

// Route untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::post('/admin/approve/{user}', [DashboardController::class, 'approve'])->name('approve.user');
    Route::post('/admin/approve/peternak/{id}', [AdminController::class, 'approvePeternak'])->name('approve.peternak');
    Route::get('/admin/tambah', [AdminController::class, 'tambahAdminForm'])->name('admin.tambah.form');
    Route::post('/admin/tambah', [AdminController::class, 'tambahAdmin'])->name('admin.tambah');
});

