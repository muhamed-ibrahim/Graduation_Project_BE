<?php

namespace App\Http\Controllers\Api\school\eductionalLevels;

use App\Models\Term;
use App\Models\Grade;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    public function showStages(){
        $stages = Auth::user()->school->stages;
        return ApiResponse::sendResponse('200','Stages Retrived Successfully',$stages);
    }

    public function showLevels($stageId){
        $levels = Grade::where('stage_id',$stageId)->get();
        return ApiResponse::sendResponse('200','levels Retrived Successfully',$levels);

    }

    public function showterms(){
        $terms = Term::all();
        return ApiResponse::sendResponse('200','terms Retrived Successfully',$terms);

    }
}
