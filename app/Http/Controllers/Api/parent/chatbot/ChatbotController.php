<?php

namespace App\Http\Controllers\Api\parent\chatbot;

use App\Models\Chatpot;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\parent\ChatpotRequest;
use App\Models\Chatbot;
use App\Models\Support;
use Illuminate\Support\Facades\Auth;

class ChatbotController extends Controller
{
    public function addQuestion(ChatpotRequest $request){

        $chatpot = $request->validated();
        $user =Auth::user()->id;
        $chatpot['parent_id'] = $user;
        $Storechatpot = Support::create($chatpot);
        if ($Storechatpot) {
            return ApiResponse::sendResponse(201, 'Question Added Successfully', []);
        }
    }

    public function getChatbotData(){
        $chatbot = Chatbot::all();
        return ApiResponse::sendResponse(200, 'Chatbot Data Retrivied Successfully',$chatbot);
    }

}
