<?php

namespace App\Http\Controllers\Api\parent;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
