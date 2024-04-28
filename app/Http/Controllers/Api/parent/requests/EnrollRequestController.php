<?php

namespace App\Http\Controllers\Api\parent\requests;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\EnrollRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\parent\requests\EnrolRequest;

class EnrollRequestController extends Controller
{
    public function enrollRequest(EnrolRequest $request)
    {
        $user = Auth::user();
        $enroll = new EnrollRequest();
        $schools = $request->input('schools');
        // upload image
        if($request->hasFile('image'))
        {
            // if(file_exists(public_path().'/storage/adminstration_admins/'.$request->user()->image)){
            //     unlink(public_path().'/storage/adminstration_admins/'.$request->user()->image);
            // }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('storage/requests/EnrollReqimage/', $filename);
            $enroll->image=$filename;
        }
        // upload child certificate
        if($request->hasFile('childbirth_certificate'))
        {
            // if(file_exists(public_path().'/storage/adminstration_admins/'.$request->user()->image)){
            //     unlink(public_path().'/storage/adminstration_admins/'.$request->user()->image);
            // }
            $file = $request->file('childbirth_certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('storage/requests/EnrollReqChildcertificate/', $filename);
            $enroll->childbirth_certificate=$filename;
        }
        $enroll->name=$request->name;
        $enroll->student_national_id= $request->student_national_id;
        $enroll->birthdate=$request->birthdate;
        $enroll->gender=$request->gender;
        $enroll->religion=$request->religion;
        $enroll->parent_id= $user->id;
        $enroll->save();
        $enroll->Schools()->attach($schools);
        if($enroll){
            return ApiResponse::sendResponse(201,'Request send to schools successfully',[]);
        }



    }


    public function updateEnrollRequest(EnrolRequest $request,$id)
    {

        $enroll = EnrollRequest::findorfail($id);
        $schools = $request->input('schools');
        // upload image
        if($request->hasFile('image'))
        {
            // if(file_exists(public_path().'/storage/adminstration_admins/'.$request->user()->image)){
            //     unlink(public_path().'/storage/adminstration_admins/'.$request->user()->image);
            // }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('storage/requests/EnrollReqimage/', $filename);
            $enroll->image=$filename;
        }
        // upload child certificate
        if($request->hasFile('childbirth_certificate'))
        {
            // if(file_exists(public_path().'/storage/adminstration_admins/'.$request->user()->image)){
            //     unlink(public_path().'/storage/adminstration_admins/'.$request->user()->image);
            // }
            $file = $request->file('childbirth_certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('storage/requests/EnrollReqChildcertificate/', $filename);
            $enroll->childbirth_certificate=$filename;
        }
        $enroll->name=$request->name;
        $enroll->student_national_id= $request->student_national_id;
        $enroll->birthdate=$request->birthdate;
        $enroll->gender=$request->gender;
        $enroll->religion=$request->religion;
        $enroll->save();
        $enroll->Schools()->sync($schools);
        if($enroll){
            return ApiResponse::sendResponse(200,'Request update and send to schools successfully',[]);
        }



    }





    public function deleteEnrollRequest($id){
        $enroll = EnrollRequest::findorfail($id);
        $enroll->Schools()->detach();
        $enroll->delete();
        return ApiResponse::sendResponse(200,'Request deleted successfully',[]);
    }

}
