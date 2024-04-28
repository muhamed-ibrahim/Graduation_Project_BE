<?php

namespace App\Http\Controllers\Api\school;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\school\UpdateStudentRequest;
use App\Http\Resources\school\StudentResource;
use App\Models\Adminstration;
use App\Models\School;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function showStudents(){

        $user = Auth::user();
        $school =$user->school_id;
        $students = Student::where('school_id','=',$school)->get();
        return ApiResponse::sendResponse(200,'Students Retrived Successfully',StudentResource::collection($students));

    }


    public function showStudentInf($id){
        $user = Auth::user();
        $school =$user->school_id;
        $student = Student::where('school_id','=',$school)->get()->find($id);
        if(!$student){
            return ApiResponse::sendResponse(200,'this Student not found in this school',[]);
        }
        return ApiResponse::sendResponse(200,'Students Retrived Successfully',new StudentResource($student));
    }


    public function updateStudent(UpdateStudentRequest $request,$id){
        $newData =  $request->validated();
        $user = Auth::user();
        $school =$user->school_id;
        $student = Student::where('school_id','=',$school)->get()->find($id);
        if($student){
            $student->update($newData);
            return ApiResponse::sendResponse(200,'Student Data Updated  Successfully',[]);
        }
        return ApiResponse::sendResponse(200,'this user not found in this school',[]);


    }

    public function showAdminstrations($state){
        $adminstrations = Adminstration::where('state','=',$state)->get();
        return ApiResponse::sendResponse('200','Adminstration Retrivied Successfully',$adminstrations);
    }

    public function showSchoolsAdminstrations($id){
        $schools = School::where('adminstration_id','=',$id)->get();
        return ApiResponse::sendResponse('200','Schools Retrivied Successfully',$schools);
    }





}
