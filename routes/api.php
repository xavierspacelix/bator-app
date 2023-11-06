<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FuelController;
use App\Http\Controllers\Api\MerkController;
use App\Http\Controllers\Api\MotorController;
use App\Http\Controllers\Api\CategoryController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user-details', [AuthController::class, 'getUserDetails']);
    Route::put('/user', [AuthController::class, 'update']);
    Route::post('/user/become-seller', [AuthController::class, 'becomeSeller']);
    Route::patch('/user/onboarding', [AuthController::class, 'onboarding']);

    // Motor
    Route::post('/motor/add', [MotorController::class, 'store']);
    Route::put('/motor/update/{motor}', [MotorController::class, 'update']);
    Route::delete('/motor/destroy/{motor}', [MotorController::class, 'destroy']);
});

// Public Data
// Category routes
Route::get('/categories', [CategoryController::class, 'index']);
// Route::get('/category/{category}', [CategoryController::class, 'show']);

// Merk routes
Route::get('/merks', [MerkController::class, 'index']);

// Fuel routes
Route::get('/fuels', [FuelController::class, 'index']);

// Motor routes
Route::get('/motors', [MotorController::class, 'index']);
Route::get('/motor/{motor}', [MotorController::class, 'show']);
