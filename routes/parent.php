<?php

use App\Http\Controllers\Api\parent\children\ChildrenController;
use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\parent\auth\AuthController;
use App\Http\Controllers\Api\parent\requests\EnrollRequestController;
use Illuminate\Support\Facades\Route;

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
Route::post('/enrollRequest', [EnrollRequestController::class, 'enrollRequest']);
Route::post('/updateEnrollRequest/{id}', [EnrollRequestController::class, 'UpdateEnrollRequest']);
Route::post('/deleteEnrollRequest/{id}', [EnrollRequestController::class, 'deleteEnrollRequest']);

});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
