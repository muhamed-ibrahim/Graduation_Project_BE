<?php

namespace App\Http\Controllers\Api\adminstration;

use App\Models\Report;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\adminstration\ReportRequest;
use App\Http\Resources\adminstration\ShowReportResource;

class ReportController extends Controller
{
    public function addReport(ReportRequest $request){
        $report = new Report();
        $report->subject = $request->subject;
        $report->description = $request->description;
        $report->save();
        $schools = $request->input('schools');
        $report->Schools()->attach($schools);
        return ApiResponse::sendResponse(201,'Report added Successfully',[]);
    }

    public function showReport(Request $request){
        $report = Report::all();
        return ApiResponse::sendResponse(200,'Report Retrived Successfully',ShowReportResource::collection($report));
    }

    public function deleteReport($id){
        $report = Report::findorfail($id);
        $report->Schools()->detach();
        $report->delete();
        return ApiResponse::sendResponse(200,'Report Deleted Successfully',[]);
    }
}
