<?php

namespace App\Http\Controllers\Api\adminstration;

use App\Models\School;
use App\Models\Student;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function getStudent($school,$stage,$grade,Request $request){
        $user = Auth::user();
        $adminstration = $user->adminstration_id;
        $sc = School::find($school);
        if($sc->adminstration_id==$adminstration){
            $student = Student::where('school_id',$school)->where('stage_id',$stage)->where('grade_id',$grade)->get();
            if (is_null($request->national_id)) {
                if(!$student){
                    return ApiResponse::sendResponse('404','Student Not Found',[]);
                }
                return ApiResponse::sendResponse('200','Student Retrivied Successfully',$student);
            }else{
                $studentWithID = $student->where('national_id',$request->national_id)->first();
                if(!$studentWithID){
                    return ApiResponse::sendResponse('404','Student Not Found',[]);
                }
                return ApiResponse::sendResponse('200','Student Retrivied Successfully',$studentWithID);
            }
        }else{
            return ApiResponse::sendResponse('200','This School is Not Found in this Adminstration',[]);
        }

    }

}
