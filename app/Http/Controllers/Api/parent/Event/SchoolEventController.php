<?php

namespace App\Http\Controllers\Api\parent\Event;

use App\Models\Student;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\parent\SchoolEventResource;

class SchoolEventController extends Controller
{
    public function ShowEvent(){
        $user = Auth::user();
        $eventsWithSchool = $user->Events;
        return ApiResponse::sendResponse(200, 'Events Retrivied Successfully', SchoolEventResource::collection($eventsWithSchool));


    }
}
