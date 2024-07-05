<?php

namespace App\Http\Controllers\Api\school\requests;

use App\Models\User;
use App\Models\School;
use App\Models\Student;
use Spatie\FlareClient\Api;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\TransferRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Http\Resources\school\requests\TransferRequestResource;
use App\Notifications\SchoolNotification\TransferFromNewNotification;

class TransferRequestController extends Controller
{
    public function ShowTransferRequestsToNew()
    {
        $user = Auth::user();
        $newschool = $user->school_id;
        $TransferRequests = TransferRequest::where('new_school', $newschool)->get();
        return ApiResponse::sendResponse(200, 'Transfer Requests Retrivied To new School Successfully', TransferRequestResource::collection($TransferRequests));
    }

    public function ShowTransferRequestsToOld()
    {
        $user = Auth::user();
        $oldschool = $user->school_id;
        $TransferRequests = TransferRequest::where('old_school', $oldschool)->get();
        return ApiResponse::sendResponse(200, 'Transfer Requests Retrivied To old School Successfully', TransferRequestResource::collection($TransferRequests));
    }

    public function SendTransferReqToNew(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => ['required'],
        ]);
        $TransferRequests = TransferRequest::find($id);
        $sendTransferRequests = $TransferRequests->update($validated);
        $newSchool = School::find($TransferRequests->new_school);
        $newStaff = $newSchool->staff()->where('staff_role', 'مسؤول الطلبات')->get();
        $oldSchool = School::find($TransferRequests->old_school);
        $oldStaff = $oldSchool->staff()->where('staff_role', 'مسؤول الطلبات')->get();

        $parent = User::find($TransferRequests->parent_id);

        if ($sendTransferRequests) {
            if ($TransferRequests->status == 1) {
                Notification::send($oldSchool->Manager()->first(), new TransferFromNewNotification($TransferRequests, $newSchool, ' تم قبول طلب تحويل الطالب  ' . $TransferRequests->name . ' من قِبل ' . $newSchool->name, '/school/services/transfer-requests/request-info/' . $TransferRequests->id));
                Notification::send($oldStaff, new TransferFromNewNotification($TransferRequests, $newSchool, ' تم قبول طلب تحويل الطالب  ' . $TransferRequests->name . ' من قِبل ' . $newSchool->name, '/school/services/transfer-requests/request-info/' . $TransferRequests->id));
            } else {
                Notification::send($oldSchool->Manager()->first(), new TransferFromNewNotification($TransferRequests, $newSchool, ' تم رفض طلب تحويل الطالب  ' . $TransferRequests->name . ' من قِبل ' . $newSchool->name, '/Darb/Dashboard/Transfer/Search'));
                Notification::send($parent, new TransferFromNewNotification($TransferRequests, $newSchool, ' تم رفض طلبك لتحويل الطالب  ' . $TransferRequests->name . ' من قِبل ' . $newSchool->name, '/Darb/Dashboard/Transfer/' . $TransferRequests->id));
            }
            return ApiResponse::sendResponse(200, 'Transfer status updated to new school Successfully', []);
        }
    }

    public function SendTransferReqToOld(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => ['required'],
        ]);
        $user = Auth::user();
        $getTransferRequest = TransferRequest::find($id);
        $TransferRequests = $getTransferRequest->update($validated);
        $newSchool = School::find($getTransferRequest->new_school);
        $parent = User::find($getTransferRequest->parent_id);

        if ($TransferRequests && $validated['status'] == 2) {
            $Student = Student::where('national_id', $getTransferRequest['student_national_id'])->first();
            if ($Student) {
                $Student->update(['school_id' => $getTransferRequest['new_school']]);
                Notification::send($parent, new TransferFromNewNotification($getTransferRequest, $newSchool, ' تم قبول طلبك لتحويل الطالب  ' . $getTransferRequest->name . ' من قِبل ' . $newSchool->name, '/Darb/Dashboard/Transfer/' . $getTransferRequest->id));

                return ApiResponse::sendResponse(200, 'Student Deleted From This School And Added To New School', []);
            } else {
                return ApiResponse::sendResponse(404, 'Student Not Found', []);
            }
        }
    }
}
