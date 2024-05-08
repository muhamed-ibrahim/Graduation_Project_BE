<?php

namespace App\Http\Controllers\Api\school\requests;

use Spatie\FlareClient\Api;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\TransferRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\school\requests\TransferRequestResource;

class TransferRequestController extends Controller
{
    public function ShowTransferRequestsToNew(){
       $user = Auth::user();
       $newschool = $user->school_id;
       $TransferRequests = TransferRequest::where('new_school',$newschool)->get();
       return ApiResponse::sendResponse(200,'Transfer Requests Retrivied To new School Successfully',TransferRequestResource::collection($TransferRequests));

    }

    public function ShowTransferRequestsToOld(){
        $user = Auth::user();
       $oldschool = $user->school_id;
       $TransferRequests = TransferRequest::where('old_school',$oldschool)->get();
       return ApiResponse::sendResponse(200,'Transfer Requests Retrivied To old School Successfully',TransferRequestResource::collection($TransferRequests));

    }
}
