<?php

namespace App\Http\Controllers\Api\adminstration;

use App\Models\AdAdmin;
use Spatie\FlareClient\Api;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
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
            if(file_exists(public_path().'/storage/adminstration_admins/'.$request->user()->image)){
                unlink('/storage/adminstration_admins/'.$request->user()->image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('storage/adminstration_admins/', $filename);
            $request->user()->image = $filename;
        }
        $request->user()->name = $request->name;
        $request->user()->email = $request->email;
        $request->user()->phone = $request->phone;
        $request->user()->save();
        return ApiResponse::sendResponse(200,'Adminstration Profile Updated Successfully',[]);
    }

}
