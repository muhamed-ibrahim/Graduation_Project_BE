<?php

namespace App\Http\Controllers\Api\school\requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EnrollRequestController extends Controller
{
    public function ShowEnrollRequests(){
        $user = Auth::user();
        
    }
}
