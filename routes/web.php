<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\FuelController;
use App\Http\Controllers\Admin\MerkController;

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
        Route::resource('users', AdminUserController::class, [
            'names' => [
                'index' => 'admin.users.index',
                'create' => 'admin.users.create',
                'store' => 'admin.users.store',
                'show' => 'admin.users.show',
                'edit' => 'admin.users.edit',
                'update' => 'admin.users.update',
                'destroy' => 'admin.users.destroy',
            ]
        ]);

        Route::resource('categories', CategoryController::class, [
            'names' => [
                'index' => 'admin.categories.index',
                'create' => 'admin.categories.create',
                'store' => 'admin.categories.store',
                'show' => 'admin.categories.show',
                'edit' => 'admin.categories.edit',
                'update' => 'admin.categories.update',
                'destroy' => 'admin.categories.destroy',
            ]
        ]);

        Route::resource('merks', MerkController::class, [
            'names' => [
                'index' => 'admin.merks.index',
                'create' => 'admin.merks.create',
                'store' => 'admin.merks.store',
                'show' => 'admin.merks.show',
                'edit' => 'admin.merks.edit',
                'update' => 'admin.merks.update',
                'destroy' => 'admin.merks.destroy',
            ]
        ]);

        Route::resource('fuels', FuelController::class, [
            'names' => [
                'index' => 'admin.fuels.index',
                'create' => 'admin.fuels.create',
                'store' => 'admin.fuels.store',
                'show' => 'admin.fuels.show',
                'edit' => 'admin.fuels.edit',
                'update' => 'admin.fuels.update',
                'destroy' => 'admin.fuels.destroy',
            ]
        ]);
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
