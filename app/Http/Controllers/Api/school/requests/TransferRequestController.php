<?php

namespace App\Http\Controllers\Api\school\requests;

use Spatie\FlareClient\Api;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\TransferRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\school\requests\TransferRequestResource;
use App\Models\Student;

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

    public function SendTransferReqToNew(Request $request,$id)
    {
        $validated = $request->validate([
            'status' => ['required'],
        ]);
        $TransferRequests = TransferRequest::find($id)->update($validated);
        if($TransferRequests){
            return ApiResponse::sendResponse(200, 'Transfer status updated to new school Successfully', []);
        }
    }

    public function SendTransferReqToOld(Request $request,$id)
    {
        $validated = $request->validate([
            'status' => ['required'],
        ]);
        $user = Auth::user();
        $getTransferRequest = TransferRequest::find($id);
        $TransferRequests = $getTransferRequest->update($validated);
        if($TransferRequests&&$validated['status']==2){
            $Student = Student::where('national_id',$getTransferRequest['student_national_id'])->first();
            if ($Student) {
                $Student->update(['school_id' => $getTransferRequest['new_school']]);
                return ApiResponse::sendResponse(200, 'Student Deleted From This School And Added To New School',[]);
            }
            else {
                return ApiResponse::sendResponse(404, 'Student Not Found', []);
            }

        }
    }
}
