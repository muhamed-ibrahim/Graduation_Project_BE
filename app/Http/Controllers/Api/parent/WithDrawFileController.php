<?php

namespace App\Http\Controllers\Api\parent;

use App\Models\Student;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WithDrawFileController extends Controller
{
    public function withDrawFile($StudentId){
        $student = Student::find($StudentId);
        $student->status = 1;
        if($student->save()){
            return ApiResponse::sendResponse(200, 'Your request send To School', []);
        }

    }
}
