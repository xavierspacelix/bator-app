<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

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


Route::prefix('administrator')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('adminLogin');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('adminLoginStore');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('adminLogout');
    });

    Route::middleware(['isAdmin'])->group(function () {
        Route::get('dashboard', DashboardController::class)->name('dashboardAdmin');
    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
