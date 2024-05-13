<?php

namespace App\Http\Controllers\Api\parent\requests;

use App\Models\Student;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\TransferRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class TransferRequestController extends Controller
{
    public function transferRequest(Request $request,$id)
    {
        $validate = $request->validate([
            'new_school' => ['required'],
        ]);
        $user = Auth::user();
        $student = Student::where('parent_id',$user->id)->get()->find($id);

        $transferData = [
            'name' => $student->name,
            'student_national_id' => $student->national_id,
            'birthdate' => $student->date_of_birth,
            'gender' => $student->gender,
            'religion' => $student->religion,
            'nationality' => $student->nationality,
            'state' => $student->state,
            'address' => $student->address,
            'country' => $student->country,
            'image' => $student->image,
            'childbirth_certificate' => $student->childbirth_certificate,
            'parent_id' => $user->id,
            'old_school' => $student->school_id,
            'new_school' => $validate['new_school'],
        ];
        File::copy('storage/student_data/st-image/' . $transferData['image'], 'storage/requests/TransReqimage/' . $transferData['image']);
        File::copy('storage/student_data/st-certficate/' . $transferData['childbirth_certificate'], 'storage/requests/TransReqChildcertificate/' . $transferData['childbirth_certificate']);
        $transfer = TransferRequest::create($transferData);
        if($transfer){
            return ApiResponse::sendResponse(201,'Request transfer send to school successfully',[]);
        }

    }

    public function ShowTransferReqWithNationalID($nationalId){
        $transfer = TransferRequest::where('student_national_id',$nationalId)->get();
        if(!$transfer->isEmpty()){
            return ApiResponse::sendResponse(200,'Request Transfer Retrivied Successfully',$transfer);
        }else{
            $student = Student::where('national_id', $nationalId)->where('parent_id',Auth::user()->id)->first();
            if($student){
                return ApiResponse::sendResponse(404, 'Student Found but No Transfer Requests Found',[]);
            } else {
                return ApiResponse::sendResponse(404, 'Student Not Found',[]);
            }
        }

    }
}
