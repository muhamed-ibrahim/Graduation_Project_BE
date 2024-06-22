<?php

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\school\StaffController;
use App\Http\Controllers\Api\school\ManagerController;
use App\Http\Controllers\Api\school\StudentController;
use App\Http\Controllers\Api\school\auth\AuthController;
use App\Http\Controllers\Api\school\auth\PasswordController;
use App\Http\Controllers\Api\school\auth\ForgotPasswordController;
use App\Http\Controllers\Api\school\eductionalLevels\LevelController;
use App\Http\Controllers\Api\school\requests\EnrollRequestController;
use App\Http\Controllers\Api\school\eductionalLevels\SubjectController;
use App\Http\Controllers\Api\school\requests\TransferRequestController;

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
    Route::post('logout', 'logout')->middleware('auth:sanctum','multiguard');
});



Route::post('forgot-password', [ForgotPasswordController::class, 'forgot']);
Route::post('reset-password', [ForgotPasswordController::class, 'reset']);



Route::group(['middleware' => ['auth:sanctum','school_manager']], function () {
    Route::get('manager/showProfile', [ManagerController::class, 'showProfile']);
    Route::post('manager/updateProfile', [ManagerController::class, 'updateProfile']);
    Route::post('/addStaff', [StaffController::class, 'addStaff']);
});

Route::group(['middleware' => ['auth:sanctum','school_staff']], function () {
    Route::get('staff/showProfile', [StaffController::class, 'showProfile']);
    Route::post('staff/updateProfile', [StaffController::class, 'updateProfile']);
});


Route::group(['middleware' => ['auth:sanctum','multiguard']], function () {
    Route::post('/updatePassword', [PasswordController::class, 'updatePassword']);
    Route::get('/showStudents', [StudentController::class, 'showStudents']);
    Route::get('/showStudentInf/{id}', [StudentController::class, 'showStudentInf']);
    Route::post('/updateStudent/{id}', [StudentController::class, 'updateStudent']);
    Route::get('/ShowEnrollRequests', [EnrollRequestController::class, 'ShowEnrollRequests']);
    Route::post('/SendEnrollRequests/{id}', [EnrollRequestController::class, 'SendEnrollRequests']);
    Route::get('/ShowTransferRequestsToNew', [TransferRequestController::class, 'ShowTransferRequestsTONew']);
    Route::get('/ShowTransferRequestsToOld', [TransferRequestController::class, 'ShowTransferRequestsToOld']);
    Route::post('/SendTransferReqToNew/{id}', [TransferRequestController::class, 'SendTransferReqToNew']);
    Route::post('/SendTransferReqToOld/{id}', [TransferRequestController::class, 'SendTransferReqToOld']);

    Route::get('/showStages', [LevelController::class, 'showStages']);
    Route::get('/subjectsGrade/{stage}', [SubjectController::class, 'subjectsGrade']);


});



