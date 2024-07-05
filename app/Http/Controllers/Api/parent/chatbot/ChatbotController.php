<?php

namespace App\Http\Controllers\Api\parent\chatbot;

use App\Models\Chatbot;
use App\Models\Chatpot;
use App\Models\Student;
use App\Models\Support;
use App\Models\SchoolStaff;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\SchoolManager;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;
use App\Http\Requests\parent\ChatpotRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ParentNotification\SupportNotification;

class ChatbotController extends Controller
{
    public function addQuestion(ChatpotRequest $request)
    {
        $chatpot = $request->validated();
        $filteredChatpot = collect($chatpot)->except('Student_nationalId')->toArray();
        $user = Auth::user();
        $child = Student::where('national_id', $request->input('Student_nationalId'))->where('parent_id', $user->id)->first();
        if ($child) {
            $filteredChatpot['parent_id'] = $user->id;
            $filteredChatpot['school_id'] = $child->school_id;
            $Storechatpot = Support::create($filteredChatpot);
            if ($Storechatpot) {
                $Manager = SchoolManager::where('school_id', $child->school_id)->get();
                $staff = SchoolStaff::where('school_id', $child->school_id)->where('staff_role', 'مسؤول الدعم والشكاوي')->get();
                Notification::send($Manager, new SupportNotification($Storechatpot, $user, ' تم ارسال طلب استفسار جديد من قبل ' . $user->name, '/school/services/technical-support/ticket-info/' . $Storechatpot->id));
                Notification::send($staff, new SupportNotification($Storechatpot, $user, ' تم ارسال طلب استفسار جديد من قبل ' . $user->name, '/school/services/technical-support/ticket-info/' . $Storechatpot->id));
                return ApiResponse::sendResponse(201, 'Question Added Successfully', []);
            }
        } else {
            return ApiResponse::sendResponse(200, 'This Student Not Found', []);
        }
    }

    public function showSupport()
    {
        $user = Auth()->user();
        $support = Support::where('parent_id', $user->id)->with('school')->get();
        return ApiResponse::sendResponse(200, 'This Student Not Found', $support);
    }

    public function getChatbotData()
    {
        $chatbot = Chatbot::all();
        return ApiResponse::sendResponse(200, 'Chatbot Data Retrivied Successfully', $chatbot);
    }
}
