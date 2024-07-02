<?php

namespace App\Http\Controllers\Api\school;

use App\Models\Student;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WithDrawFileController extends Controller
{
    public function withDrawFile($StudentId){
        $student = Student::find($StudentId);
        $student->status = 2;
        if($student->save()){
            return ApiResponse::sendResponse(200, 'School Send TO parent', []);
        }
    }
}
