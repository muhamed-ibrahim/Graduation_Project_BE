<?php

namespace App\Http\Controllers\Api\school\eductionalLevels;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    public function showStages(){
        $stages = Auth::user()->school->stages;
        return ApiResponse::sendResponse('200','Stages Retrived Successfully',$stages);
    }
}
