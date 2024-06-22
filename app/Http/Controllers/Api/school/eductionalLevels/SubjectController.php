<?php

namespace App\Http\Controllers\Api\school\eductionalLevels;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function subjectsGrade($stage){
        $school = Auth::user()->school;
        $stagesWithGradesAndTermSubjects = $school->stages()->where('stages.id',$stage)->with(['grades.termSubject.subject'])->get();
        if (!$stagesWithGradesAndTermSubjects) {
            return ApiResponse::sendResponse('404', 'Stage not found',[]);
        }
        return ApiResponse::sendResponse('200','Subject retrivied Successfully',$stagesWithGradesAndTermSubjects);
    }
}
