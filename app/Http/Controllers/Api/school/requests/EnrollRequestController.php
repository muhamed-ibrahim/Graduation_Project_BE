<?php

namespace App\Http\Controllers\Api\school\requests;

use App\Models\School;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\EnrollRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\parent\requests\EnrolRequest;
use App\Http\Resources\school\requests\EnrollRequestResources;
use App\Models\Student;
use PhpParser\Node\Stmt\Return_;

class EnrollRequestController extends Controller
{
    public function ShowEnrollRequests(){
        $user = Auth::user();
        $schoolID = $user->school_id;
        $getSchool = School::where('id', $schoolID)->first()->enrollRequest;

        return ApiResponse::sendResponse('200','Requests Retrivied Successfully',EnrollRequestResources::collection($getSchool));
    }

    public function SendEnrollRequests(Request $request,$id){

        $request->validate([
            'status' => ['required','integer'],
        ]);
        $user = Auth::user();
        $school = $user->school_id;
        $req = EnrollRequest::find($id);
        $SendSchool = $req->Schools()->wherePivot('school_id',$school)->first();
       if($request->status==0){
           $send = $SendSchool->pivot->update(['status' => 0]);
           return ApiResponse::sendResponse('200','Status Updated and Student rejected Successfully',[]);

       }else{
            $send = $SendSchool->pivot->update(['status' => 1]);
            $req->Schools()->sync($school);
            $addStudent = new Student();
            $addStudent->name = $req->name;
            $addStudent->nationality = $req->nationality;
            $addStudent->national_id = $req->student_national_id;
            $addStudent->gender = $req->gender;
            $addStudent->date_of_birth = $req->	birthdate;
            $addStudent->address = $req->parent()->first()->address;
            $addStudent->state = $req->state;
            $addStudent->religion = $req->religion;
            $addStudent->country = $req->country;
            $addStudent->level = 'level 1';
            $addStudent->parent_id = $req->parent()->first()->id;
            $addStudent->school_id  = $SendSchool->id;
            $addStudent->save();
            if($addStudent){
                return ApiResponse::sendResponse('201','Status Updated and Student Added Successfully',[]);
            }
        }

    }
}
