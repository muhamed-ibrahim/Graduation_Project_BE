<?php

namespace App\Http\Controllers\Api\adminstration;

use App\Models\School;
use App\Models\AdAdmin;
use Spatie\FlareClient\Api;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\Adminstration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\adminstration\UpdateProfile;
use App\Http\Resources\adminstration\AdProfileResource;

class AdminstrationController extends Controller
{
    public function showProfile(){
        $adminstration = Auth::user();
        return ApiResponse::sendResponse(200,'Adminstration Profile Retrived Successfully',new AdProfileResource($adminstration));
    }
    public function updateProfile(UpdateProfile $request){
        if($request->hasFile('image'))
        {
            // if(file_exists(public_path().'/storage/adminstration_admins/'.$request->user()->image)){
            //     unlink(public_path().'/storage/adminstration_admins/'.$request->user()->image);
            // }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('storage/adminstration_admins/', $filename);
            $request->user()->image = $filename;
        }
        $request->user()->name = $request->name;
        $request->user()->email = $request->email;
        $request->user()->phone = $request->phone;
        $request->user()->address = $request->address;
        $request->user()->save();
        return ApiResponse::sendResponse(200,'Adminstration Profile Updated Successfully',[]);
    }

    public function showAdminstrations($state){
        $adminstrations = Adminstration::where('state','=',$state)->get();
        return ApiResponse::sendResponse('200','Adminstration Retrivied Successfully',$adminstrations);
    }

    public function showSchoolsAdminstrations($id){
        $schools = School::where('adminstration_id','=',$id)->get();
        return ApiResponse::sendResponse('200','Schools Retrivied Successfully',$schools);
    }

    public function showSchoolsExceptSchool(Request $request,$id){
        $validated = $request->validate([
            'school_Id' => ['required'],
        ]);
        $schools = School::where('adminstration_id', '=', $id)
        ->whereNotIn('id', [$validated['school_Id']])
        ->get();
        return ApiResponse::sendResponse('200','Schools Retrivied Successfully',$schools);
    }

    public function getAllAdminstrations(){
        $adminstration = Auth::user()->adminstration;
        $adminstration_id = $adminstration->id;
        $staff = AdAdmin::where('adminstration_id',$adminstration_id)->get();
        return ApiResponse::sendResponse('200','Adminstration Staff Retrivied Successfully',$staff);
    }

}
