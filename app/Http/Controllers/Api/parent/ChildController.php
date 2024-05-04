<?php

namespace App\Http\Controllers\Api\parent;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\parent\ChildResource;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class ChildController extends Controller
{
    public function showChild(){
        $user = Auth::user();
        $getchild = Student::where('parent_id',$user->id)->get();
        if($getchild){
            return ApiResponse::sendResponse(200,'Childs Retrivied Successfully',ChildResource::collection($getchild));
        }
    }
}
