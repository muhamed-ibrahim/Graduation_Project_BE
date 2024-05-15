<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function notification(){
        $user = Auth::user();
        return ApiResponse::sendResponse(200,'UnRead Notifications Retrivied Successfully',$user->unreadNotifications);
    }
}
