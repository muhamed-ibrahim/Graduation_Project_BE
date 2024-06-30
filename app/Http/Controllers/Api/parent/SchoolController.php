<?php

namespace App\Http\Controllers\Api\parent;

use App\Models\Student;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\parent\ShowSchoolResource;

class SchoolController extends Controller
{
    public function getChildSchools()
    {
        $user = Auth::user();
        $students = Student::where('parent_id',$user->id)->get();
        $schools = $students->map(function ($student) {
            return $student->school;
        })->unique('id')->values();
        return ApiResponse::sendResponse(200, 'Schools Retrivied Successfully', $schools);
    }

    public function getRecommendedSchools(Request $request, $adminstrationId)
    {
        $user = Auth::user();
        // get schools sorted by compatibility in schoolparentrank table
        $schools = $user->recommendedSchools()->where('adminstration_id', $adminstrationId)->orderBy('compatibility', 'desc')->take(2)->get();

        return  ApiResponse::sendResponse(200, 'gggggg', $schools);
    }
}
