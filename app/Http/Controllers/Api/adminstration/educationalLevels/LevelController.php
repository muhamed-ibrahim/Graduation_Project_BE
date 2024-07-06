<?php

namespace App\Http\Controllers\Api\adminstration\educationalLevels;

use App\Models\Term;
use App\Models\Grade;
use App\Models\Score;
use App\Models\Stage;
use App\Models\Student;
use App\Models\Subject;
use App\Models\TermSubject;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\adminstration\ShowSubjectResource;

class LevelController extends Controller
{
    public function showStages()
    {
        $stage = Stage::all();
        return ApiResponse::sendResponse('200', 'Stages Retrived Successfully', $stage);
    }

    public function showStudentStage($studentId)
    {
        $student = Student::find($studentId);
        $stage = $student->stage->stage_name;
        $getstage = Stage::where('stage_name', '<=', $stage)->get();
        return ApiResponse::sendResponse('200', 'Stages Retrived Successfully', $getstage);
    }

    public function showLevels($stageId)
    {
        $levels = Grade::where('stage_id', $stageId)->get();
        return ApiResponse::sendResponse('200', 'levels Retrived Successfully', $levels);
    }

    public function showStudentLevel($studentId, $stageId)
    {
        $student = Student::find($studentId);
        $stage = $student->stage;
        $grade = $student->grade->id;
        if ($stage->id != $stageId) {
            $Grade = Grade::where('stage_id', $stageId)->get();
            return ApiResponse::sendResponse('200', 'levels Retrived Successfully', $Grade);
        } else {
            $Grade = Grade::where('stage_id', $stageId)->where('id', '<=', $grade)->get();
            return ApiResponse::sendResponse('200', 'levels Retrived Successfully', $Grade);
        }
    }

    public function showterms()
    {
        $terms = Term::all();
        return ApiResponse::sendResponse('200', 'terms Retrived Successfully', $terms);
    }

    public function showSubjects($levelId, $termId)
    {
        $subjects = TermSubject::where('Grade_id', $levelId)->where('term_id', $termId)->get();
        return ApiResponse::sendResponse('200', 'subjects Retrived Successfully', ShowSubjectResource::collection($subjects));
    }

    public function Subjects(Request $request)
    {
        $subjects = Subject::all();
        return ApiResponse::sendResponse('200', 'subjects Retrived Successfully', $subjects);
    }

    public function getScoresByStudentGradeAndTerm($studentId, $gradeId, $termId)
    {
        $getTermSubject = TermSubject::with(['scores' => function ($query) use ($studentId) {
            $query->where('student_id', $studentId);
        }, 'grade', 'term', 'subject'])
            ->where('grade_id', $gradeId)
            ->where('term_id', $termId)
            ->get();

        $scoresFormatted = $getTermSubject->groupBy(function ($termSubject) {
            return $termSubject->grade_id;
        })->map(function ($termSubjectsByGrade, $gradeId) {
            return [
                'GradeID' => $gradeId,
                'GradeName' => $termSubjectsByGrade->first()->grade->grade_name,
                'terms' => $termSubjectsByGrade->groupBy(function ($termSubject) {
                    return $termSubject->term_id;
                })->map(function ($termSubjectsByTerm, $termId) {
                    $scores = $termSubjectsByTerm->flatMap(function ($termSubject) {
                        return $termSubject->scores->map(function ($score) {
                            return [
                                'score_id' => $score->id,
                                'score_subject' => $score->termSubject->subject->subject_name,
                                'Score' => $score->score,
                            ];
                        });
                    });

                    // Calculate the total possible score (assuming each subject has a max score of 100)
                    $totalPossibleScore = $scores->count() * 100;
                    // Calculate the total actual score
                    $totalScore = $scores->sum('Score');
                    // Calculate the percentage
                    $percentage = $totalPossibleScore > 0 ? ($totalScore / $totalPossibleScore) * 100 : 0;

                    $scoresWithPercentages = $scores->map(function ($score) {
                        return array_merge($score, ['Percentage' => $score['Score']]);
                    });

                    return [
                        'TermID' => $termId,
                        'TermName' => $termSubjectsByTerm->first()->term->term_name,
                        'scores' => $scoresWithPercentages,
                        'totalScore' => $totalScore,
                        'percentage' => $percentage,
                    ];
                })->values(),
            ];
        })->values();

        return ApiResponse::sendResponse('200', 'Scores formatted successfully', $scoresFormatted);
    }
}
