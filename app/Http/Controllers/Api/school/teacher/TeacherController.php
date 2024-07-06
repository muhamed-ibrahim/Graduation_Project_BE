<?php

namespace App\Http\Controllers\Api\school\teacher;

use App\Mail\ApplicationAccepted;
use App\Mail\ApplicationRejected;
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

    public function sendAcceptOrReject(Request $request, $teacherId)
    {
        $valid = $request->validate([
            'status' => 'required',
        ]);
        $application = Application::find($teacherId);
        if ($application) {
            if ($request->status == 1) {
                $application->status = 1;
                // send email to teacher
                Mail::to($application->email)->send(new ApplicationAccepted($application));
            } elseif ($request->status == 2) {
                $application->status = 2;
                // send email to teacher
                Mail::to($application->email)->send(new ApplicationRejected($application));
            }

            $application->save();

            return ApiResponse::sendResponse(200, 'Application retrieved and updated successfully', $application);
        }
    }
}
