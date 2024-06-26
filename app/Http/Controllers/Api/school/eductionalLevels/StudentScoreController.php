<?php

namespace App\Http\Controllers\Api\school\eductionalLevels;

use App\Models\Student;
use App\Models\TermSubject;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;

class StudentScoreController extends Controller
{
    public function addStudentScore($studentId, $termSubject, Request $request)
    {
        $validate = $request->validate([
            'score' => 'required|integer',
        ]);
        $school = Auth::user()->school->id;
        $student = Student::with('grade')->findOrFail($studentId);
        if ($school == $student->school_id) {
            // Check if the term_subject has term_id 2
            $termSubjectInstance = TermSubject::findOrFail($termSubject);
            if ($termSubjectInstance->term_id == 2) {
                $Subjectsgrade = TermSubject::where('grade_id', $student->grade_id)->get();
                // Get all subjects for term_id 1
                $term1Subjects = $Subjectsgrade->where('term_id', 1)->pluck('id');
                // Get student's scores for term_id 1 subjects
                $term1Scores = Score::where('student_id', $studentId)->whereIn('term_subject_id', $term1Subjects)->get();
                // Check if the student has scores for all subjects in term_id 1
                $term1SubjectIds = $term1Subjects->toArray();
                foreach ($term1SubjectIds as $subjectId) {
                    if (!$term1Scores->contains('term_subject_id', $subjectId)) {
                        return ApiResponse::sendResponse('400', 'Student does not have a score for all subjects in Term 1', []);
                    }
                }
                // Check if the student has passed all subjects in term_id 1
                foreach ($term1Scores as $score) {
                    if ($score->score < 50) {
                        return ApiResponse::sendResponse('400', 'Student has not passed all subjects in Term 1', []);
                    }
                }
            }
            $existingScore = Score::where('student_id', $studentId)->where('term_subject_id', $termSubject)->first();
            if ($existingScore) {
                $existingScore->score = $validate['score'];
                $existingScore->save();
                return ApiResponse::sendResponse('200', 'Student Score Updated Successfully', $existingScore);
            } else {
                $ADDScore = new Score();
                $ADDScore->student_id = $studentId;
                $ADDScore->term_subject_id = $termSubject;
                $ADDScore->score = $validate['score'];
                $ADDScore->save();
                return ApiResponse::sendResponse('201', 'Student Score Added Successfully', $ADDScore);
            }
        } else {
            return ApiResponse::sendResponse('200', 'This student not found in this school', []);
        }
    }
}
