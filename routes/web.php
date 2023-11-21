<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\FuelController;
use App\Http\Controllers\Admin\MerkController;
use App\Http\Controllers\Admin\MotorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\TypeModelMotorController;
use App\Http\Controllers\MotorController as ControllersMotorController;
use App\Http\Controllers\SellerController;

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

        Route::resource('type-model-motor', TypeModelMotorController::class, [
            'names' => [
                'index' => 'admin.type.index',
                'create' => 'admin.type.create',
                'store' => 'admin.type.store',
                'show' => 'admin.type.show',
                'edit' => 'admin.type.edit',
                'update' => 'admin.type.update',
                'destroy' => 'admin.type.destroy',
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

        Route::resource('motors', MotorController::class, [
            'names' => [
                'index' => 'admin.motors.index',
                'create' => 'admin.motors.create',
                'store' => 'admin.motors.store',
                'show' => 'admin.motors.show',
                'edit' => 'admin.motors.edit',
                'update' => 'admin.motors.update',
                'destroy' => 'admin.motors.destroy',
            ]
        ]);
    });
});

Route::get('/', WelcomeController::class)->name('welcome');
Route::get('motor/{motor}', [ControllersMotorController::class, 'show'])->name('detailMotor');




Route::middleware(['auth'])->group(function () {
    // Become A Seller
    Route::get('/become-a-seller', [ProfileController::class, 'becomeSeller'])->name('becomeSeller');
    Route::patch('/become-a-seller', [ProfileController::class, 'becomeSellerStore'])->name('becomeSellerStore');
    // Sell Motor
    Route::get('/post', [SellerController::class, 'view'])->name('jualView');
    Route::get('/jual', [SellerController::class, 'index'])->name('jual');
    // Profile User & Dashboard User
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::delete('/avatar/delete', [ProfileController::class, 'destroyAvatar'])->name('avatar.delete');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Public API


require __DIR__ . '/auth.php';
