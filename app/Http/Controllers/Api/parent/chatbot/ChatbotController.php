<?php

namespace App\Http\Controllers\Api\parent\chatbot;

use App\Models\Chatpot;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\parent\ChatpotRequest;
use App\Models\Chatbot;
use App\Models\Student;
use App\Models\Support;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class ChatbotController extends Controller
{
    public function addQuestion(ChatpotRequest $request)
    {
        $chatpot = $request->validated();
        $filteredChatpot = collect($chatpot)->except('Student_nationalId')->toArray();
        $user = Auth::user()->id;
        $child = Student::where('national_id', $request->input('Student_nationalId'))->where('parent_id', $user)->first();
        if ($child) {
            $filteredChatpot['parent_id'] = $user;
            $filteredChatpot['school_id'] = $child->school_id;
            $Storechatpot = Support::create($filteredChatpot);
            if ($Storechatpot) {
                return ApiResponse::sendResponse(201, 'Question Added Successfully', []);
            }
        } else {
            return ApiResponse::sendResponse(200, 'This Student Not Found', []);
        }
    }

    public function getChatbotData()
    {
        $chatbot = Chatbot::all();
        return ApiResponse::sendResponse(200, 'Chatbot Data Retrivied Successfully', $chatbot);
    }
}
