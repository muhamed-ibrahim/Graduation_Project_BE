<?php

namespace App\Http\Controllers\Api\school\application;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function getApplication()
    {
        $user = Auth()->user();
        $application = $user->school->applications;
        return ApiResponse::sendResponse(200, 'Applications Retrivied Successfully', $application);
    }
}
