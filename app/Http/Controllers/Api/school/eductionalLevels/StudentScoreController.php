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
        // Validate the request input
        $validatedData = $request->validate([
            'score' => 'required|integer',
        ]);

        $scoreValue = $validatedData['score'];

        // Retrieve the authenticated user's school ID
        $schoolId = Auth::user()->school->id;

        // Find the student and check if they belong to the authenticated user's school
        $student = Student::with('grade')->findOrFail($studentId);
        if ($schoolId != $student->school_id) {
            return ApiResponse::sendResponse('400', 'This student is not found in this school', []);
        }

        // Find the term subject instance
        $termSubjectInstance = TermSubject::findOrFail($termSubject);

        // If term subject belongs to term 2, check for term 1 subjects and scores
        if ($termSubjectInstance->term_id == 2) {
            if (!$this->hasPassedTermSubjects($studentId, $student->grade_id, 1)) {
                return ApiResponse::sendResponse('400', 'Student has not passed all subjects in Term 1', []);
            }
        }

        // Process score update or addition for the term subject
        $existingScore = Score::where('student_id', $studentId)->where('term_subject_id', $termSubject)->first();
        if ($existingScore) {
            $existingScore->score = $scoreValue;
            $existingScore->save();
        } else {
            $newScore = new Score();
            $newScore->student_id = $studentId;
            $newScore->term_subject_id = $termSubject;
            $newScore->score = $scoreValue;
            $newScore->save();
        }

        // Check if the student has passed all subjects in term 2 after adding/updating the score
        if (!$this->hasCompletedAndPassedTermSubjects($studentId, $student->grade_id, 2)) {
            return ApiResponse::sendResponse('200', 'Student Score Added/Updated Successfully, but has not passed all subjects in Term 2', []);
        }

        // If all subjects in term 2 are passed, update the student's grade
        $this->promoteStudent($student);

        // Save the updated student and return the response
        if ($student->save()) {
            // Reload the student's grade relationship
            $student->load('grade');
            return ApiResponse::sendResponse('200', 'Student Score Added/Updated Successfully and progressed to the next Grade', $student);
        }
    }

    /**
     * Check if the student has passed all subjects for a given term.
     *
     * @param int $studentId
     * @param int $gradeId
     * @param int $termId
     * @return bool
     */
    private function hasPassedTermSubjects($studentId, $gradeId, $termId)
    {
        $termSubjects = TermSubject::where('grade_id', $gradeId)->where('term_id', $termId)->pluck('id');
        $termScores = Score::where('student_id', $studentId)->whereIn('term_subject_id', $termSubjects)->get();

        foreach ($termSubjects as $subjectId) {
            if (!$termScores->contains('term_subject_id', $subjectId) || $termScores->where('term_subject_id', $subjectId)->first()->score < 50) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if the student has completed and passed all subjects for a given term.
     *
     * @param int $studentId
     * @param int $gradeId
     * @param int $termId
     * @return bool
     */
    private function hasCompletedAndPassedTermSubjects($studentId, $gradeId, $termId)
    {
        $termSubjects = TermSubject::where('grade_id', $gradeId)->where('term_id', $termId)->pluck('id');
        $termScores = Score::where('student_id', $studentId)->whereIn('term_subject_id', $termSubjects)->get();

        foreach ($termSubjects as $subjectId) {
            if (!$termScores->contains('term_subject_id', $subjectId) || $termScores->where('term_subject_id', $subjectId)->first()->score < 50) {
                return false;
            }
        }

        return true;
    }

    /**
     * Promote the student to the next grade and stage if applicable.
     *
     * @param Student $student
     * @return void
     */
    private function promoteStudent($student)
    {
        if ($student->grade_id == 6 || $student->grade_id == 9) {
            $student->stage_id += 1;
        }
        $student->grade_id += 1;
    }
}
