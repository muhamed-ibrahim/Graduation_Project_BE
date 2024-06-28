<?php

namespace App\Http\Controllers\Api\school\chatpot;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chatpot;
use Illuminate\Support\Facades\Auth;

class ChatpotController extends Controller
{
    public function showChatpot(){
        $school = Auth::user()->school;
        $chatpot = $school->chatpot;
        return ApiResponse::sendResponse(200, 'Question Retrivied Successfully', $chatpot);

    }

    public function addAnswer(Request $request,$id){
        $chatpot = Chatpot::findorfail($id);
        $chatpot->answer = $request->answer;
        if($chatpot->save()){
            return ApiResponse::sendResponse(200, 'Question Retrivied Successfully', $chatpot);
        }

    }
}
