<?php

namespace App\Http\Controllers\Api\school\Events;

use App\Models\AdEvent;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\school\EventRequest;

class EventController extends Controller
{
    public function addEvent(EventRequest $request)
    {
        $school = Auth()->user()->school;
        $students = $school->students;
        foreach ($students as $student) {
            $parents[] = $student->parent->id;
        }
        $parents = array_unique($parents);
        $event = new AdEvent();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->school_id = $school->id;
        $event->save();
        $event->parents()->attach($parents);
        return ApiResponse::sendResponse(201, 'Event added Successfully', []);
    }

    public function showEvent(Request $request){
        $school = Auth()->user()->school->id;
        $event = AdEvent::where('school_id',$school)->get();
        return ApiResponse::sendResponse(200,'Events Retrived Successfully',$event);

    }

    public function updateEvent(EventRequest $request,$id)
    {
        $event = AdEvent::findorfail($id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->save();
        return ApiResponse::sendResponse(200,'Event Updated Successfully',[]);

    }

    public function deleteEvent($id){
        $event = AdEvent::findorfail($id);
        $event->parents()->detach();
        $event->delete();
        return ApiResponse::sendResponse(200,'Event Deleted Successfully',[]);
    }

}
