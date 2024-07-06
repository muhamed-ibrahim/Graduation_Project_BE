<?php

namespace App\Http\Controllers\Api\school\teacher;

use App\Models\Application;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Mail\TeacherApplication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use App\Http\Resources\School\ApplicationResource;

class TeacherController extends Controller
{
    public function getApplication()
    {
        $user = Auth()->user();
        $application = $user->school->applications;
        return ApiResponse::sendResponse(200, 'Applications Retrivied Successfully', ApplicationResource::collection($application));
    }

    public function sendAcceptOrReject(Request $request,$teacherId){
        $valid = $request->validate([
            'status' => 'required',
        ]);
        $application = Application::find($teacherId);
        if($valid['status'] == 1){
            $application->status = 1;
        }else if($valid['status'] == 2){
            $application->status = 2;

        }
        $application->save();
        return ApiResponse::sendResponse(200, 'Applications Retrivied Successfully', ApplicationResource::collection($application));

    }
}