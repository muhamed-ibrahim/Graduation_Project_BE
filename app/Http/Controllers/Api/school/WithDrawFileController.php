<?php

namespace App\Http\Controllers\Api\school;

use App\Models\Student;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\school\StudentResource;

class WithDrawFileController extends Controller
{
    public function studentToWithDrawFile()
    {
        $user = Auth()->user();
        $Students = $user->school->students()->where('status', 1)->get();
        if ($Students->isNotEmpty()) {
            return ApiResponse::sendResponse(200, 'Students Retrivied Successfully', StudentResource::collection($Students));
        } else {
            return ApiResponse::sendResponse(200, 'there are no students to withdraw', []);
        }
    }
    public function withDrawFile($StudentId)
    {
        $student = Student::find($StudentId);
        $student->status = 2;
        if ($student->save()) {
            return ApiResponse::sendResponse(200, 'School Send TO parent', []);
        }
    }
}
