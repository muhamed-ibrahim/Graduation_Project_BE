<?php

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\school\StaffController;
use App\Http\Controllers\Api\school\ManagerController;
use App\Http\Controllers\Api\school\StudentController;
use App\Http\Controllers\Api\school\auth\AuthController;
use App\Http\Controllers\Api\school\Events\EventController;
use App\Http\Controllers\Api\school\WithDrawFileController;
use App\Http\Controllers\Api\shared\NotificationController;
use App\Http\Controllers\Api\school\auth\PasswordController;
use App\Http\Controllers\Api\school\report\ReportController;
use App\Http\Controllers\Api\school\chatbot\ChatbotController;
use App\Http\Controllers\Api\school\teacher\TeacherController;
use App\Http\Controllers\Api\school\auth\ForgotPasswordController;
use App\Http\Controllers\Api\school\eductionalLevels\LevelController;
use App\Http\Controllers\Api\school\requests\EnrollRequestController;
use App\Http\Controllers\Api\school\requests\TransferRequestController;
use App\Http\Controllers\Api\school\Events\AdminstrationEventController;
use App\Http\Controllers\Api\school\eductionalLevels\StudentScoreController;

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
    Route::post('logout', 'logout')->middleware('auth:sanctum', 'multiguard');
});



Route::post('forgot-password', [ForgotPasswordController::class, 'forgot']);
Route::post('reset-password', [ForgotPasswordController::class, 'reset']);



Route::group(['middleware' => ['auth:sanctum', 'school_manager']], function () {
    Route::get('manager/showProfile', [ManagerController::class, 'showProfile']);
    Route::post('manager/updateProfile', [ManagerController::class, 'updateProfile']);
    Route::post('/addStaff', [StaffController::class, 'addStaff']);
    Route::get('/showStaff', [StaffController::class, 'showStaff']);
    Route::post('/updateStaff/{StaffId}', [StaffController::class, 'updateStaff']);
    Route::get('/deleteStaff/{staffId}', [StaffController::class, 'deleteStaff']);
});

Route::group(['middleware' => ['auth:sanctum', 'school_staff']], function () {
    Route::get('staff/showProfile', [StaffController::class, 'showProfile']);
    Route::post('staff/updateProfile', [StaffController::class, 'updateProfile']);
});


Route::group(['middleware' => ['auth:sanctum', 'multiguard']], function () {
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
    Route::get('/showStudentStage/{studentId}', [LevelController::class, 'showStudentStage']);
    Route::get('/showLevels/{stageId}', [LevelController::class, 'showLevels']);
    Route::get('/showStudentLevel/{studentId}/{stageId}', [LevelController::class, 'showStudentLevel']);
    Route::get('/showterms', [LevelController::class, 'showterms']);
    Route::get('/showSubjects/{levelId}/{termId}', [LevelController::class, 'showSubjects']);
    Route::get('/addStudentGrade/{studentId}', [StudentScoreController::class, 'addStudentGrade']);
    Route::get('/studentinfo/{studentId}', [StudentController::class, 'studentinfo']);
    Route::get('/getStudentsGrade/{termSubject}', [StudentController::class, 'getStudentsGrade']);
    Route::post('/addStudentScore/{studentId}/{termSubject}', [StudentScoreController::class, 'addStudentScore']);
    Route::get('/getScoresByStudentGradeAndTerm/{studentId}/{levelId}/{termId}', [LevelController::class, 'getScoresByStudentGradeAndTerm']);
    Route::get('/showReport', [ReportController::class, 'showReport']);

    Route::get('/ShowAdEvent', [AdminstrationEventController::class, 'ShowAdEvent']);
    Route::post('/addEvent', [EventController::class, 'addEvent']);
    Route::get('/showEvent', [EventController::class, 'showEvent']);
    Route::post('/updateEvent/{eventId}', [EventController::class, 'updateEvent']);
    Route::get('/deleteEvent/{eventId}', [EventController::class, 'deleteEvent']);
    Route::get('/showChatpot', [ChatbotController::class, 'showChatpot']);
    Route::post('/addAnswer/{questionId}', [ChatbotController::class, 'addAnswer']);

    Route::get('/studentToWithDrawFile', [WithDrawFileController::class, 'studentToWithDrawFile']);
    Route::post('/withDrawFile/{studentId}', [WithDrawFileController::class, 'withDrawFile']);

    Route::get('/getApplication', [TeacherController::class, 'getApplication']);
    Route::post('/sendAcceptOrReject/{teacherId}', [TeacherController::class, 'sendAcceptOrReject']);
    Route::post('/addTeacher', [TeacherController::class, 'addTeacher']);
    Route::get('/getTeacher', [TeacherController::class, 'getTeacher']);
    Route::post('/updateTeacher/{teacherId}', [TeacherController::class, 'updateTeacher']);
    Route::get('/deleteTeacher/{teacherId}', [TeacherController::class, 'deleteTeacher']);








    Route::get('/notification', [NotificationController::class, 'notification']);
    Route::get('/markAsRead/{id}', [NotificationController::class, 'markAsRead']);
});
