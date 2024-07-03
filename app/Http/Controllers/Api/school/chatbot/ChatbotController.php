<?php

namespace App\Http\Controllers\Api\school\chatbot;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chatbot;
use App\Models\Chatpot;
use App\Models\Support;
use Illuminate\Support\Facades\Auth;

class ChatbotController extends Controller
{
    public function showChatpot(){
        $school = Auth::user()->school;
        $chatpot = $school->support;
        return ApiResponse::sendResponse(200, 'Question Retrivied Successfully', $chatpot);

    }

    public function addAnswer(Request $request,$id){
        $support = Support::findorfail($id);
        $support->answer = $request->answer;
        $support->status = 1;
        if($support->save()){
            $chatbot = new Chatbot();
            $chatbot->question = $support->question;
            $chatbot->answer = $support->answer;
            $chatbot->save();
            return ApiResponse::sendResponse(201, 'Answer Added Successfully',[]);
        }
    }

}
