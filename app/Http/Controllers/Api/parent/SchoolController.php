<?php

namespace App\Http\Controllers\Api\parent;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\parent\ShowSchoolResource;

class SchoolController extends Controller
{
    public function getChildSchools(){
        $user = Auth()->user()->students;
        return ApiResponse::sendResponse(201, 'Event added Successfully', $user);

        // $students = $school->students;
        // foreach ($students as $student) {
        //     $parents[] = $student->parent->id;
        // }
        // $parents = array_unique($parents);
    }

    public function getRecommendedSchools(Request $request,$adminstrationId)
    {
        $user = Auth::user();
        // get schools sorted by compatibility in schoolparentrank table
        $schools = $user->recommendedSchools()->where('adminstration_id', $adminstrationId)->orderBy('compatibility','desc')->take(2)->get();

        return  ApiResponse::sendResponse(200,'gggggg',$schools);
    }
}
