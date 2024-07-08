<?php

namespace App\Http\Controllers\Api\parent;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\parent\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\parent\ParentResource;
use App\Models\School;
use App\Models\SchoolRating;

class ParentController extends Controller
{

    public function showProfile(){
        $user = Auth::user();
        return ApiResponse::sendResponse(200,'Parent Profile Retrived Successfully',new ParentResource($user));
    }

    public function updateProfile(UpdateProfileRequest $request){


        $request->user()->address = $request->address;
        $request->user()->phone = $request->phone;
        $request->user()->birthdate = $request->birthdate;
        $request->user()->save();
        return ApiResponse::sendResponse(200,'Parent Profile Updated Successfully',[]);
    }






}
