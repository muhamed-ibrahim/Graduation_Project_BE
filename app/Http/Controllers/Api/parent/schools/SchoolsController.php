<?php

namespace App\Http\Controllers\Api\parent\schools;

use App\Http\Resources\adminstration\ShowSchoolResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Child;
use Ramsey\Collection\Collection;


class SchoolsController extends Controller
{
    // get recommended schools
    public function getRecommendedSchools(Request $request)
    {
        $user = \Auth::user();
        // get schools sorted by compatibility in schoolparentrank table
        $schools = $user->recommendedSchools()->orderBy('compatibility','desc')->get();
        return showSchoolResource::collection($schools);
    }



}
