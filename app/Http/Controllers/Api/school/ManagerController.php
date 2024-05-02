<?php

namespace App\Http\Controllers\Api\school;

use App\Models\School;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\school\ManagerProfileResource;
use App\Http\Requests\school\UpdateManagerProfileRequest;
use App\Http\Resources\school\StaffProfileResource;

class ManagerController extends Controller
{


    public function showProfile(){
        $user = Auth::user();
        if($user->role === 'manager'){
            return ApiResponse::sendResponse(200,'Manager Profile Retrived Successfully',new ManagerProfileResource($user));
        }
    }


    public function updateProfile(UpdateManagerProfileRequest $request){

        $school['image'] = null;
        if($request->hasFile('image'))
         {
        //     if(file_exists(public_path().'/storage/adminstration_admins/'.$request->user()->image)){
        //         unlink(public_path().'/storage/adminstration_admins/'.$request->user()->image);
        //     }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('storage/school_logo/', $filename);
            $school['image'] = $filename;
         }
         $StoreSchool = School::find($request->user()->school_id)->update($school);

        $request->user()->manager_name = $request->manager_name;
        $request->user()->manager_phone = $request->manager_phone;
        $request->user()->manager_address = $request->manager_address;
        $request->user()->save();

        //to update school logo

        return ApiResponse::sendResponse(200,'Manager Profile Updated Successfully',[]);
    }

}
