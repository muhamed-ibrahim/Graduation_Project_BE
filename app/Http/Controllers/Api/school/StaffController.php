<?php

namespace App\Http\Controllers\Api\school;

use App\Models\School;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\school\AddStaffRequest;
use App\Http\Resources\school\StaffProfileResource;
use App\Http\Requests\school\UpdateStaffProfileRequest;
use App\Models\SchoolStaff;

class StaffController extends Controller
{
    public function addStaff(AddStaffRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();
        $data['school_id'] = $user->school_id;
        $staff = SchoolStaff::create($data);
        if ($staff) {
            return ApiResponse::sendResponse(201, 'Staff Added Successfully', []);
        }
    }
    public function showProfile()
    {
        $user = Auth::user();
        if ($user->role === 'staff') {
            return ApiResponse::sendResponse(200, 'Staff Profile Retrived Successfully', new StaffProfileResource($user));
        }
    }


    public function updateProfile(UpdateStaffProfileRequest $request)
    {

        $school['image'] = null;
        if ($request->hasFile('image')) {
            //     if(file_exists(public_path().'/storage/adminstration_admins/'.$request->user()->image)){
            //         unlink(public_path().'/storage/adminstration_admins/'.$request->user()->image);
            //     }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/school_logo/', $filename);
            $school['image'] = $filename;
        }
        $StoreSchool = School::find($request->user()->school_id)->update($school);

        $request->user()->staff_name = $request->staff_name;
        $request->user()->staff_phone = $request->staff_phone;
        $request->user()->staff_address = $request->staff_address;
        $request->user()->save();

        //to update school logo

        return ApiResponse::sendResponse(200, 'Staff Profile Updated Successfully', []);
    }
}
