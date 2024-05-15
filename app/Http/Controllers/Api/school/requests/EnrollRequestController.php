<?php

namespace App\Http\Controllers\Api\school\requests;

use App\Models\School;
use App\Models\Student;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\EnrollRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEnrollReqNotification;
use App\Http\Requests\parent\requests\EnrolRequest;
use App\Http\Resources\school\requests\EnrollRequestResources;

class EnrollRequestController extends Controller
{
    public function ShowEnrollRequests()
    {
        $user = Auth::user();
        $schoolID = $user->school_id;
        $getSchool = School::where('id', $schoolID)->first()->enrollRequest;

        return ApiResponse::sendResponse('200', 'Requests Retrivied Successfully', EnrollRequestResources::collection($getSchool));
    }

    public function SendEnrollRequests(Request $request, $id)
    {

        $request->validate([
            'status' => ['required', 'integer'],
        ]);
        $user = Auth::user();
        $school = $user->school_id;
        $req = EnrollRequest::find($id);
        $SendSchool = $req->Schools()->wherePivot('school_id', $school)->first();
        if ($request->status == 0) {
            $send = $SendSchool->pivot->update(['status' => 0]);
            return ApiResponse::sendResponse('200', 'Status Updated and Student rejected Successfully', []);
        } else {
            $send = $SendSchool->pivot->update(['status' => 1]);
            $req->Schools()->sync($school);
            $studentData = [
                'name' => $req->name,
                'nationality' => $req->nationality,
                'national_id' => $req->student_national_id,
                'image' => $req->image,
                'gender' => $req->gender,
                'date_of_birth' => $req->birthdate,
                'address' => $req->parent()->first()->address,
                'state' => $req->state,
                'religion' => $req->religion,
                'country' => $req->country,
                'childbirth_certificate' => $req->childbirth_certificate,
                'level' => 'الصف الأول الأبتدائي',
                'parent_id' => $req->parent()->first()->id,
                'school_id' => $SendSchool->id
            ];
            File::copy('storage/requests/EnrollReqimage/' . $studentData['image'], 'storage/student_data/st-image/' . $studentData['image']);
            File::copy('storage/requests/EnrollReqChildcertificate/' . $studentData['childbirth_certificate'], 'storage/student_data/st-certficate/' . $studentData['childbirth_certificate']);
            $addStudent = Student::create($studentData);
            if ($addStudent) {
                Notification::send($req->parent()->first(), new SendEnrollReqNotification($addStudent,$user));
                return ApiResponse::sendResponse('201', 'Status Updated and Student Added Successfully', []);
            }
        }
    }
}
