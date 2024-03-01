<?php

namespace App\Http\Controllers\Api\adminstration;

use App\Models\School;
use Spatie\FlareClient\Api;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\adminstration\AddSchoolRequest;

class SchoolController extends Controller
{
    public function addSchool(AddSchoolRequest $request){

        $school = $request->validated();
        $school['adminstration_id'] = Auth::user()->adminstration_id;
        $StoreSchool = School::create($school);
        if($StoreSchool){
            return ApiResponse::sendResponse(201,'School Added Successfully',[]);
        }


    }

    public function showSchool(Request $request){
        $user = Auth::user();
        $school = School::where('adminstration_id',$user->adminstration_id)->get();
        return ApiResponse::sendResponse(200,'School Retrived Successfully',$school);

    }
}
