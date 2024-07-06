<?php

namespace App\Http\Controllers\Api\parent;

use App\Models\School;
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
        return ApiResponse::sendResponse(200, 'Schools Retrivied Successfully', ShowSchoolResource::collection($schools));
    }

    public function getRecommendedSchools(Request $request, $adminstrationId)
    {
        $user = Auth::user();
        // get schools sorted by compatibility in schoolparentrank table
        $schools = $user->recommendedSchools()->where('adminstration_id', $adminstrationId)->orderBy('compatibility', 'desc')->take(2)->get();

        return  ApiResponse::sendResponse(200, 'gggggg', $schools);
    }

    public function rateSchool(Request $request)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'rate' => 'required|numeric|min:1|max:5',
        ]);
        $parent = Auth::user();
        $school = School::find($request->school_id);

        // create rating
        $school->ratings()->updateOrCreate(
            ['parent_id' => $parent->id, 'year' => date('Y')],
            ['rating' => $request->rate],
        );

        return ApiResponse::sendResponse(200, 'School Rated Successfully');
    }

    public function Get(){
        $school = School::all();
        return ApiResponse::sendResponse(200, 'School Rated Successfully',ShowSchoolResource::collection($school));

    }
}
