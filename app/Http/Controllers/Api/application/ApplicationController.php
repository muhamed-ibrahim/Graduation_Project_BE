<?php

namespace App\Http\Controllers\Api\application;

use App\Models\Application;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\application\ApplicationRequest;

class ApplicationController extends Controller
{
    public function EnrollInApplication(ApplicationRequest $request){
        $Application = $request->validated();
        if ($request->hasFile('cv')) {
            // if(file_exists(public_path().'/storage/school_logo/'.$request->user()->image)){
            //     unlink(public_path().'/storage/school_logo/'.$request->user()->image);
            // }
            $file = $request->file('cv');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/applications/', $filename);
            $Application['cv'] = $filename;
        }
        $newApplication = Application::create($Application);
        if($newApplication){
            return ApiResponse::sendResponse(201,'Your Application Added Successfully',[]);
        }

    }
}
