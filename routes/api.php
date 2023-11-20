<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FuelController;
use App\Http\Controllers\Api\MerkController;
use App\Http\Controllers\Api\MotorController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DependencyDropdownController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('forgot-password', [AuthController::class, 'forgotPassword']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user-details', [AuthController::class, 'getUserDetails']);
    Route::put('/user/settings/update-details', [AuthController::class, 'update']);
    Route::put('/user/settings/update-password', [AuthController::class, 'updatePassword']);
    Route::post('/user/become-seller', [AuthController::class, 'becomeSeller']);

    // Motor
    Route::post('/motor/add', [MotorController::class, 'store']);
    Route::put('/motor/update/{motor}', [MotorController::class, 'update']);
    Route::delete('/motor/destroy/{motor}', [MotorController::class, 'destroy']);
});

// Public Data
// Category routes
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/category/{category}', [CategoryController::class, 'show']);

// Merk routes
Route::get('/merks', [MerkController::class, 'index']);

// Fuel routes
Route::get('/fuels', [FuelController::class, 'index']);

// Motor routes
Route::get('/motors', [MotorController::class, 'index']);
Route::get('/motor/{motor}', [MotorController::class, 'show']);

// Province, City, District, Villages routes
Route::get('/province', [DependencyDropdownController::class, 'provinces']);
Route::get('/city', [DependencyDropdownController::class, 'cities'])->name('cities');
Route::get('/district', [DependencyDropdownController::class, 'districts'])->name('districts');
Route::get('/village', [DependencyDropdownController::class, 'villages'])->name('villages');
