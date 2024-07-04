<?php

namespace App\Http\Controllers\Api\adminstration\Report;

use App\Models\Report;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\adminstration\ReportRequest;
use App\Http\Resources\adminstration\ShowReportResource;
use App\Notifications\AdminstrationNotification\ReportNotification;

class ReportController extends Controller
{
    public function addReport(ReportRequest $request){
        $adminstration = Auth::user()->adminstration;
        $report = new Report();
        $report->subject = $request->subject;
        $report->description = $request->description;
        $report->adminstration_id = $adminstration->id;
        $report->save();
        $schools = $request->input('schools');
        if ($schools) {
            $report->Schools()->attach($schools);
        }
        $SchoolsToNotify = $report->Schools()->whereIn('school_id', $schools)->get();
        foreach($SchoolsToNotify as $school){
            Notification::send($school->Manager()->first(), new ReportNotification($report,$adminstration,"تمت اضافة تقرير جديد من قبل ","/Admin/Reports"));
            Notification::send($school->staff, new ReportNotification($report,$adminstration,"تمت اضافة تقرير جديد من قبل ","/Admin/Reports"));

        }
        return ApiResponse::sendResponse(201,'Report added Successfully',[]);
    }

    public function showReport(Request $request){
        $adminstration = Auth::user()->adminstration->id;
        $report = Report::where('adminstration_id',$adminstration)->get();
        return ApiResponse::sendResponse(200,'Report Retrived Successfully',ShowReportResource::collection($report));
    }

    public function deleteReport($id){
        $report = Report::findorfail($id);
        $report->Schools()->detach();
        $report->delete();
        return ApiResponse::sendResponse(200,'Report Deleted Successfully',[]);
    }
}
