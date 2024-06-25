<?php

namespace App\Http\Controllers\Api\adminstration;

use App\Models\School;
use Spatie\FlareClient\Api;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\adminstration\SchoolRequest;
use App\Http\Requests\adminstration\ManagerRequest;
use App\Http\Resources\adminstration\ShowSchoolResource;
use App\Models\SchoolManager;
use Illuminate\Database\Capsule\Manager;

class SchoolController extends Controller
{
    public function addSchool(SchoolRequest $request, ManagerRequest $req)
    {

        $school = $request->validated();
        $school['adminstration_id'] = Auth::user()->adminstration_id;
        if ($request->hasFile('image')) {
            // if(file_exists(public_path().'/storage/school_logo/'.$request->user()->image)){
            //     unlink(public_path().'/storage/school_logo/'.$request->user()->image);
            // }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/school_logo/', $filename);
            $school['image'] = $filename;
        }
        $filteredSchool = collect($school)->except('stages')->toArray();
        $StoreSchool = School::create($filteredSchool);
        if ($StoreSchool) {
            $stages = $request->input('stages');
            $StoreStages = $StoreSchool->stages()->sync($stages);
            if ($StoreStages) {
                $manager = $req->validated();
                $manager['school_id'] = $StoreSchool->id;
                $StoreManager = SchoolManager::create($manager);
                if ($StoreManager) {
                    return ApiResponse::sendResponse(201, 'School and Manager Added Successfully', []);
                }
            }
        }
    }

    public function showSchool(Request $request)
    {
        $user = Auth::user();

        $school = School::where('adminstration_id', $user->adminstration_id)->get();
        return ApiResponse::sendResponse(200, 'School and Manager Retrived Successfully', ShowSchoolResource::collection($school));
    }

    public function updateSchool(SchoolRequest $request, $id, ManagerRequest $req)
    {
        $school = $request->validated();
        if ($request->hasFile('image')) {
            // if (file_exists(public_path() . '/storage/school_logo/' . $request->image)) {
            //     unlink(public_path() . '/storage/school_logo/' . $request->image);
            // }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('/storage/school_logo/', $filename);
            $school['image'] = $filename;
        }
        $filteredSchool = collect($school)->except('stages')->toArray();
        $StoreSchool = School::findorfail($id)->update($filteredSchool);
        $GetSchoolManger = School::findorfail($id)->Manager()->first()->id;
        $manager = $req->validated();
        $StoreManager = SchoolManager::findorfail($GetSchoolManger)->update($manager);
        $stages = $request->input('stages');
        $SC = School::findorfail($id);
        $StoreStages = $SC->stages()->sync($stages);
        if ($StoreSchool || $StoreManager || $StoreStages) {
            return ApiResponse::sendResponse(200, 'School and Manger updated Successfully', []);
        } else {
            return ApiResponse::sendResponse(200, 'School Not Found', []);
        }
    }

    public function deleteSchool(Request $request, $id)
    {
        $school = School::findorfail($id);
        if ($school) {
            $school->delete();
            return ApiResponse::sendResponse(200, 'School deleted Successfully', []);
        } else {
            return ApiResponse::sendResponse(200, 'School Not Found', []);
        }
    }
}
