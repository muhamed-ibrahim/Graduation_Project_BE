<?php

namespace App\Http\Controllers\Api\school\teacher;

use App\Models\Teacher;
use App\Models\Application;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Mail\TeacherApplication;
use App\Mail\ApplicationAccepted;

use App\Mail\ApplicationRejected;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\school\TeacherRequest;
use App\Http\Resources\school\TeacherResource;
use App\Http\Resources\School\ApplicationResource;

class TeacherController extends Controller
{
    public function getApplication()
    {
        $user = Auth()->user();
        $application = $user->school->applications;
        return ApiResponse::sendResponse(200, 'Applications Retrivied Successfully', ApplicationResource::collection($application));
    }

    public function getTeacher(){
        $school = Auth()->user()->school;
        $teacher = $school->teachers;
        return ApiResponse::sendResponse(200, 'Teachers retrieved successfully',TeacherResource::collection($teacher));

    }

    public function sendAcceptOrReject(Request $request, $teacherId)
    {
        $valid = $request->validate([
            'status' => 'required',
        ]);
        $application = Application::find($teacherId);
        if ($application) {
            if ($request->status == 1) {
                $application->status = 1;
                // send email to teacher
                Mail::to($application->email)->send(new ApplicationAccepted($application));
            } elseif ($request->status == 2) {
                $application->status = 2;
                // send email to teacher
                Mail::to($application->email)->send(new ApplicationRejected($application));
            }

            $application->save();

            return ApiResponse::sendResponse(200, 'Application retrieved and updated successfully', $application);
        }
    }
    public function addTeacher(Request $request)
    {
        $validatedData = $request->validate([
            'name'       => ['required', 'string'],
            'email'      => ['required', 'string', 'email', 'max:255'],
            'phone'      => ['required', 'string'],
            'address'    => ['required', 'string'],
            'birthdate'  => ['required', 'date'],
            'subject_id' => ['required'],
        ]);
        $user = Auth::user();
        $validatedData['school_id'] = $user->school_id;
        $teacher = Teacher::create($validatedData);
        if ($teacher) {
            return ApiResponse::sendResponse(201, 'Teacher Added Successfully', []);
        }
        return ApiResponse::sendResponse(500, 'An error occurred while adding the teacher', []);
    }
}
