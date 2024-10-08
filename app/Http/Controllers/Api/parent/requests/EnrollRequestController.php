<?php

namespace App\Http\Controllers\Api\parent\requests;

use App\Models\SchoolStaff;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\EnrollRequest;
use App\Models\SchoolManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\parent\requests\EnrolRequest;
use App\Notifications\SendParentToSchoolNotification;
use App\Http\Requests\parent\requests\UpdateEnrolRequest;
use App\Notifications\ParentNotification\EnrollNotification;
use App\Http\Resources\parent\requests\EnrollRequestResources;

class EnrollRequestController extends Controller
{
    public function enrollRequest(EnrolRequest $request)
    {
        $request->validated();
        $user = Auth::user();
        $enroll = new EnrollRequest();
        $schools = $request->input('schools');
        // upload image
        if ($request->hasFile('image')) {
            // if(file_exists(public_path().'/storage/adminstration_admins/'.$request->user()->image)){
            //     unlink(public_path().'/storage/adminstration_admins/'.$request->user()->image);
            // }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/requests/EnrollReqimage/', $filename);
            $enroll->image = $filename;
        }
        // upload child certificate
        if ($request->hasFile('childbirth_certificate')) {
            // if(file_exists(public_path().'/storage/adminstration_admins/'.$request->user()->image)){
            //     unlink(public_path().'/storage/adminstration_admins/'.$request->user()->image);
            // }
            $file = $request->file('childbirth_certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/requests/EnrollReqChildcertificate/', $filename);
            $enroll->childbirth_certificate = $filename;
        }
        $enroll->type = 'تسجيل';
        $enroll->name = $request->name;
        $enroll->student_national_id = $request->student_national_id;
        $enroll->birthdate = $request->birthdate;
        $enroll->gender = $request->gender;
        $enroll->religion = $request->religion;
        $enroll->nationality = $request->nationality;
        $enroll->state = $request->state;
        $enroll->country = $request->country;
        $enroll->parent_id = $user->id;
        $enroll->save();
        $enroll->Schools()->attach($schools);


        if ($enroll) {
            foreach ($schools as $school) {
                $staff = SchoolStaff::where('school_id', $school)->where('staff_role', 'مسؤول الطلبات')->get();
                $Manager = SchoolManager::where('school_id', $school)->get();
                Notification::send($Manager, new EnrollNotification($enroll, $user, ' تم ارسال طلب تقديم جديد من قبل ' . $user->name, '/school/services/enroll-requests/request-info/' . $enroll->id));
                Notification::send($staff, new EnrollNotification($enroll, $user, ' تم ارسال طلب تقديم جديد من قبل ' . $user->name, '/school/services/enroll-requests/request-info/' . $enroll->id));
            }
            return ApiResponse::sendResponse(201, 'Request send to schools successfully', []);
        }
    }

    public function ShowEnrollRequests()
    {
        $user = Auth::user();
        $req = EnrollRequest::where('parent_id', '=', $user->id)->get();
        return ApiResponse::sendResponse('200', 'Request Retrivied Successfully', EnrollRequestResources::collection($req));
    }


    public function updateEnrollRequest(UpdateEnrolRequest $request, $id)
    {
        $user = Auth::user();
        $enroll = EnrollRequest::findorfail($id);
        $schools = $request->input('schools');
        // upload image
        if ($request->hasFile('image')) {
            // if(file_exists(public_path().'/storage/adminstration_admins/'.$request->user()->image)){
            //     unlink(public_path().'/storage/adminstration_admins/'.$request->user()->image);
            // }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/requests/EnrollReqimage/', $filename);
            $enroll->image = $filename;
        }
        // upload child certificate
        if ($request->hasFile('childbirth_certificate')) {
            // if(file_exists(public_path().'/storage/adminstration_admins/'.$request->user()->image)){
            //     unlink(public_path().'/storage/adminstration_admins/'.$request->user()->image);
            // }
            $file = $request->file('childbirth_certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/requests/EnrollReqChildcertificate/', $filename);
            $enroll->childbirth_certificate = $filename;
        }
        $enroll->name = $request->name;
        $enroll->student_national_id = $request->student_national_id;
        $enroll->birthdate = $request->birthdate;
        $enroll->gender = $request->gender;
        $enroll->religion = $request->religion;
        $enroll->nationality = $request->nationality;
        $enroll->state = $request->state;
        $enroll->country = $request->country;
        $enroll->save();
        $enroll->Schools()->sync($schools);
        if ($enroll) {
            foreach ($schools as $school) {
                $staff = SchoolStaff::where('school_id', $school)->where('staff_role', 'مسؤول الطلبات')->get();
                $Manager = SchoolManager::where('school_id', $school)->get();
                Notification::send($Manager, new EnrollNotification($enroll, $user,   ' تم تعديل طلب تقديم من قبل ' . $user->name, '/school/services/enroll-requests/request-info/' . $enroll->id));
                Notification::send($staff, new EnrollNotification($enroll, $user,   ' تم تعديل طلب تقديم من قبل ' . $user->name, '/school/services/enroll-requests/request-info/' . $enroll->id));
            }
            return ApiResponse::sendResponse(200, 'Request update and send to schools successfully', []);
        }
    }





    public function deleteEnrollRequest($id)
    {
        $user = Auth::user();
        $enroll = EnrollRequest::findorfail($id);
        $schools = $enroll->Schools()->get();
        foreach ($schools as $school) {
            $staff = SchoolStaff::where('school_id', $school->id)->where('staff_role', 'مسؤول الطلبات')->get();
            $Manager = SchoolManager::where('school_id', $school->id)->get();
            Notification::send($Manager, new EnrollNotification($enroll, $user,   ' تم مسح طلب تقديم من قبل ' . $user->name, '/school/services/enroll-requests'));
            Notification::send($staff, new EnrollNotification($enroll, $user,   ' تم مسح طلب تقديم من قبل ' . $user->name, '/school/services/enroll-requests'));
        }
        $enroll->Schools()->detach();
        $enroll->delete();
        return ApiResponse::sendResponse(200, 'Request deleted successfully', $staff);
    }
}
