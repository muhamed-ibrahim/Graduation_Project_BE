<?php

namespace App\Http\Controllers\Api\school\Events;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdEvent;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\Facades\Auth;

class AdminstrationEventController extends Controller
{
    public function ShowAdEvent(){
        $school = Auth::user()->school;
        $event = $school->Events;
        return ApiResponse::sendResponse('200','Events Retrived Successfully',$event);
    }
}
