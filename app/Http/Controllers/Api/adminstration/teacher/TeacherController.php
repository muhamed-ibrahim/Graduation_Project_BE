<?php

namespace App\Http\Controllers\Api\adminstration\teacher;

use App\Models\Teacher;
use App\Models\Application;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Mail\TeacherApplication;
use App\Mail\ApplicationAccepted;
use Illuminate\Validation\Rule;


use App\Mail\ApplicationRejected;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\school\TeacherRequest;
use App\Http\Resources\school\TeacherResource;
use App\Http\Resources\School\ApplicationResource;

class TeacherController extends Controller
{

    public function getTeacher($schoolId){

        $teacher = Teacher::where('school_id',$schoolId)->get();
        return ApiResponse::sendResponse(200, 'Teachers retrieved successfully',TeacherResource::collection($teacher));

    }
}
