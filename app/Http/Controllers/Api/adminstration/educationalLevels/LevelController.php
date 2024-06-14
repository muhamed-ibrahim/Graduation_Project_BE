<?php

namespace App\Http\Controllers\Api\adminstration\educationalLevels;

use App\Models\Grade;
use App\Models\Stage;
use App\Models\TermSubject;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\adminstration\ShowSubjectResource;
use App\Models\Term;

class LevelController extends Controller
{
    public function showStages(){
        $stage = Stage::all();
        return ApiResponse::sendResponse('200','Stages Retrived Successfully',$stage);
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
