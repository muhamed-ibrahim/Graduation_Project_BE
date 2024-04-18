<?php

namespace App\Http\Controllers\Api\school;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\school\ManagerProfileResource;
use App\Http\Requests\school\UpdateManagerProfileRequest;

class ManagerProfileController extends Controller
{
    public function showProfile(){
        $manager = Auth::user();
        return ApiResponse::sendResponse(200,'Manager Profile Retrived Successfully',new ManagerProfileResource($manager));
    }


    public function updateProfile(UpdateManagerProfileRequest $request){
        // if($request->hasFile('image'))
        // {
        //     if(file_exists(public_path().'/storage/adminstration_admins/'.$request->user()->image)){
        //         unlink(public_path().'/storage/adminstration_admins/'.$request->user()->image);
        //     }
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time(). '.' . $extension;
        //     $file->move('storage/manager/', $filename);
        //     $request->user()->image = $filename;
        // }
        $request->user()->manager_phone = $request->manager_phone;
        $request->user()->manager_address = $request->manager_address;

        $request->user()->save();
        return ApiResponse::sendResponse(200,'Manager Profile Updated Successfully',[]);
    }

}
