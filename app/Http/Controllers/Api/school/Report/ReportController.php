<?php

namespace App\Http\Controllers\Api\school\report;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function showReport(){
        $school = Auth::user()->school;
        $report = $school->Reports;
        return ApiResponse::sendResponse('200','Report Retrived Successfully',$report);
    }
}
