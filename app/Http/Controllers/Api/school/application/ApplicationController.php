<?php

namespace App\Http\Controllers\Api\school\application;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\School\ApplicationResource;

class ApplicationController extends Controller
{
    public function getApplication()
    {
        $user = Auth()->user();
        $application = $user->school->applications;
        return ApiResponse::sendResponse(200, 'Applications Retrivied Successfully', ApplicationResource::collection($application));
    }
}
