<?php

namespace App\Http\Controllers\Api\shared;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\Api;

class NotificationController extends Controller
{
    public function notification(){
        $user = Auth::user();
        return ApiResponse::sendResponse(200,'UnRead Notifications Retrivied Successfully',$user->unreadNotifications);
    }

    public function markAsRead($id)
    {
        $user = Auth::user();
        $notification = $user->notifications()->findOrFail($id);

        if ($notification->unread()) {
            $notification->markAsRead();
            return ApiResponse::sendResponse(200,'Notification marked as read successfully',[]);
        }
        return ApiResponse::sendResponse(400,'Notification already read or not found',[]);
    }


}
