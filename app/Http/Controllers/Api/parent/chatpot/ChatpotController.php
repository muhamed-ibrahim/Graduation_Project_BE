<?php

namespace App\Http\Controllers\Api\parent\chatpot;

use App\Models\Chatpot;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\parent\ChatpotRequest;
use Illuminate\Support\Facades\Auth;

class ChatpotController extends Controller
{
    public function addQuestion(ChatpotRequest $request){

        $chatpot = $request->validated();
        $user =Auth::user()->id;
        $chatpot['user_id'] = $user;
        $Storechatpot = Chatpot::create($chatpot);
        if ($Storechatpot) {
            return ApiResponse::sendResponse(201, 'Question Added Successfully', []);
        }
    }
}
