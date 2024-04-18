<?php

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\school\auth\AuthController;
use App\Http\Controllers\Api\school\auth\PasswordController;
use App\Http\Controllers\Api\school\ManagerProfileController;
use App\Http\Controllers\Api\school\auth\ForgotPasswordController;

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




Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('logout', 'logout')->middleware('auth:sanctum', 'school_manager');

});
Route::post('forgot-password', [ForgotPasswordController::class, 'forgot']);
Route::post('reset-password', [ForgotPasswordController::class, 'reset']);
Route::group(['middleware' => 'auth:sanctum','school_manager'], function () {
    Route::get('/showProfile', [ManagerProfileController::class, 'showProfile']);
    Route::post('/updateProfile', [ManagerProfileController::class, 'updateProfile']);
    Route::post('/updatePassword', [PasswordController::class, 'updatePassword']);

});
