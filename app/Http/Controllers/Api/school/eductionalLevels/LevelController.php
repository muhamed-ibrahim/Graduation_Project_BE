<?php

namespace App\Http\Controllers\Api\school\eductionalLevels;

use App\Models\Term;
use App\Models\Grade;
use App\Models\TermSubject;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\school\ShowSubjectResource;

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

    public function showSubjects($levelId,$termId){
        $subjects = TermSubject::where('Grade_id',$levelId)->where('term_id',$termId)->get();
        return ApiResponse::sendResponse('200','subjects Retrived Successfully',ShowSubjectResource::collection($subjects));
    }

}
