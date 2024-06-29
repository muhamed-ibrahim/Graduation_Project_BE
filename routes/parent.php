<?php

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\TransferRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\parent\ChildController;
use App\Http\Controllers\Api\parent\ParentController;
use App\Http\Controllers\Api\parent\SchoolController;
use App\Http\Controllers\Api\parent\auth\AuthController;
use App\Http\Controllers\Api\parent\auth\PasswordController;
use App\Http\Controllers\Api\parent\chatpot\ChatpotController;
use App\Http\Controllers\Api\parent\children\ChildrenController;
use App\Http\Controllers\Api\parent\requests\EnrollRequestController;
use App\Http\Controllers\Api\parent\requests\TransferRequestController;

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
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/showProfile', [ParentController::class, 'showProfile']);
    Route::post('/updateProfile', [ParentController::class, 'updateProfile']);
    Route::post('/updatePassword', [PasswordController::class, 'updatePassword']);
    Route::post('/enrollRequest', [EnrollRequestController::class, 'enrollRequest']);
    Route::post('/updateEnrollRequest/{id}', [EnrollRequestController::class, 'UpdateEnrollRequest']);
    Route::post('/deleteEnrollRequest/{id}', [EnrollRequestController::class, 'deleteEnrollRequest']);
    Route::get('/ShowEnrollRequests', [EnrollRequestController::class, 'ShowEnrollRequests']);
    Route::get('/showChild', [ChildController::class, 'showChild']);
    Route::post('/transferRequest/{id}', [TransferRequestController::class, 'transferRequest']);
    Route::get('/ShowTransferReqWithNationalID/{nationalId}', [TransferRequestController::class, 'ShowTransferReqWithNationalID']);
    Route::post('/addQuestion', [ChatpotController::class, 'addQuestion']);

    Route::get('/getChildSchools', [SchoolController::class, 'getChildSchools']);
    // get recommended schools
    Route::get('/recommended-schools', [SchoolController::class, 'getRecommendedSchools']);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
