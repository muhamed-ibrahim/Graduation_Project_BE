<?php

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\shared\NotificationController;
use App\Http\Controllers\Api\adminstration\Events\EventController;
use App\Http\Controllers\Api\adminstration\SchoolController;
use App\Http\Controllers\Api\adminstration\StudentController;
use App\Http\Controllers\Api\adminstration\auth\AuthController;
use App\Http\Controllers\Api\adminstration\AdminstrationController;
use App\Http\Controllers\Api\adminstration\auth\PasswordController;
use App\Http\Controllers\Api\adminstration\Report\ReportController;
use App\Http\Controllers\Api\adminstration\auth\ForgotPasswordController;
use App\Http\Controllers\Api\adminstration\educationalLevels\LevelController;

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
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum', 'adminstration_admin');
});
Route::post('forgot-password', [ForgotPasswordController::class, 'forgot']);
Route::post('reset-password', [ForgotPasswordController::class, 'reset']);

Route::group(['middleware' => 'auth:sanctum','adminstration_admin'], function () {
    Route::get('/showProfile', [AdminstrationController::class, 'showProfile']);
    Route::post('/updateProfile', [AdminstrationController::class, 'updateProfile']);
    Route::post('/updatePassword', [PasswordController::class, 'updatePassword']);
    Route::post('/addSchool', [SchoolController::class, 'addSchool']);
    Route::get('/showSchool', [SchoolController::class, 'showSchool']);
    Route::post('/updateSchool/{id}', [SchoolController::class, 'updateSchool']);
    Route::post('/deleteSchool/{id}', [SchoolController::class, 'deleteSchool']);
    Route::post('/addEvent', [EventController::class, 'addEvent']);
    Route::get('/showEvent', [EventController::class, 'showEvent']);
    Route::post('/updateEvent/{id}', [EventController::class, 'updateEvent']);
    Route::post('/deleteEvent/{id}', [EventController::class, 'deleteEvent']);
    Route::get('/getAllAdminstrations', [AdminstrationController::class, 'getAllAdminstrations']);



    Route::get('/showStages', [LevelController::class, 'showStages']);
    Route::get('/showStudentStage/{studentId}', [LevelController::class, 'showStudentStage']);
    Route::get('/showLevels/{stageId}', [LevelController::class, 'showLevels']);
    Route::get('/showStudentLevel/{studentId}/{stageId}', [LevelController::class, 'showStudentLevel']);

    Route::get('/showterms', [LevelController::class, 'showterms']);
    Route::get('/showSubjects/{levelId}/{termId}', [LevelController::class, 'showSubjects']);

    Route::get('/getStudentsSchools', [StudentController::class, 'getStudentsSchools']);
    Route::post('/getStudent/{school}/{stage}/{grade}', [StudentController::class, 'getStudent']);
    Route::get('/studentinfo/{studentId}', [StudentController::class, 'studentinfo']);
    Route::get('/getScoresByStudentGradeAndTerm/{studentId}/{levelId}/{termId}', [LevelController::class, 'getScoresByStudentGradeAndTerm']);
    Route::get('/showStudentStage/{studentId}', [LevelController::class, 'showStudentStage']);

    Route::post('/addReport', [ReportController::class, 'addReport']);
    Route::get('/showReport', [ReportController::class, 'showReport']);
    Route::get('/deleteReport/{ReportId}', [ReportController::class, 'deleteReport']);







});
Route::get('/showAdminstrations/{state}', [AdminstrationController::class, 'showAdminstrations']);
Route::get('/showSchoolsAdminstrations/{id}', [AdminstrationController::class, 'showSchoolsAdminstrations']);
Route::post('/showSchoolsExceptSchool/{id}', [AdminstrationController::class, 'showSchoolsExceptSchool']);
Route::get('/notification', [NotificationController::class, 'notification'])->middleware('auth:sanctum');;
Route::get('/markAsRead/{id}', [NotificationController::class, 'markAsRead'])->middleware('auth:sanctum');;







// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
