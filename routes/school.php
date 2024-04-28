<?php

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\school\auth\AuthController;
use App\Http\Controllers\Api\school\auth\PasswordController;
use App\Http\Controllers\Api\school\ManagerProfileController;
use App\Http\Controllers\Api\school\auth\ForgotPasswordController;
use App\Http\Controllers\Api\school\requests\EnrollRequestController;
use App\Http\Controllers\Api\school\StudentController;

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
Route::get('/showAdminstrations/{state}', [StudentController::class, 'showAdminstrations']);
Route::get('/showSchoolsAdminstrations/{id}', [StudentController::class, 'showSchoolsAdminstrations']);


Route::post('forgot-password', [ForgotPasswordController::class, 'forgot']);
Route::post('reset-password', [ForgotPasswordController::class, 'reset']);
Route::group(['middleware' => 'auth:sanctum','school_manager'], function () {
    Route::get('/showProfile', [ManagerProfileController::class, 'showProfile']);
    Route::post('/updateProfile', [ManagerProfileController::class, 'updateProfile']);
    Route::post('/updatePassword', [PasswordController::class, 'updatePassword']);
    Route::get('/showStudents', [StudentController::class, 'showStudents']);
    Route::get('/showStudentInf/{id}', [StudentController::class, 'showStudentInf']);
    Route::post('/updateStudent/{id}', [StudentController::class, 'updateStudent']);
    Route::get('/ShowEnrollRequests', [EnrollRequestController::class, 'ShowEnrollRequests']);


});
