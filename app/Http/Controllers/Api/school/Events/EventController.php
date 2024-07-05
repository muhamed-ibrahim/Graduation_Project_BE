<?php

namespace App\Http\Controllers\Api\school\Events;

use Carbon\Carbon;
use App\Models\User;
use App\Models\AdEvent;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\school\EventRequest;
use App\Models\School;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SchoolNotification\EventNotification;

class EventController extends Controller
{
    public function addEvent(EventRequest $request)
    {
        $user = Auth()->user();
        $SC = School::find($user->school->id);
        $school = $user->school;
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
        $event->address = $request->address;
        $event->school_id = $school->id;

        $event->save();
        $event->parents()->attach($parents);
        $parentsToNotify = User::whereIn('id', $parents)->get();
        foreach ($parentsToNotify as $parent) {
            Notification::send($parent, new EventNotification($event, $SC, " تم اضافة مناسبة جديدة من قبل " . $school->name, "/school/services/ad-events/event-info/" . $event->id));
        }
        return ApiResponse::sendResponse(201, 'Event added Successfully', []);
    }

    public function showEvent(Request $request)
    {
        $school = Auth()->user()->school->id;
        $events = AdEvent::where('school_id', $school)->get();
        foreach ($events as $event) {
            $eventDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $event->date . ' ' . $event->time);
            if (Carbon::now()->greaterThan($eventDateTime)) {
                $event->status = 1;
                $event->save();
            }
        }
        return ApiResponse::sendResponse(200, 'Events Retrived Successfully', $events);
    }

    public function updateEvent(EventRequest $request, $id)
    {
        $user = Auth()->user();
        $SC = School::find($user->school->id);
        $school = $user->school;
        $students = $school->students;
        foreach ($students as $student) {
            $parents[] = $student->parent->id;
        }
        $parents = array_unique($parents);
        $event = AdEvent::findorfail($id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->address = $request->address;
        $event->save();
        $parentsToNotify = User::whereIn('id', $parents)->get();
        foreach ($parentsToNotify as $parent) {
            Notification::send($parent, new EventNotification($event, $SC, "تم تعديل مناسبة من قبل  " . $school->name, "/school/services/ad-events/event-info/" . $event->id));
        }
        return ApiResponse::sendResponse(200, 'Event Updated Successfully', []);
    }

    public function deleteEvent($id)
    {
        $school = Auth()->user()->school;
        $event = AdEvent::findorfail($id);
        $ParentsToNotify = $event->Parents()->get();
        foreach ($ParentsToNotify as $parent) {
            Notification::send($parent, new EventNotification($event, $school, " من قبل " . $school->name . $event->name . " تم مسح المناسبة ", NULL));
        }
        $event->parents()->detach();
        $event->delete();
        return ApiResponse::sendResponse(200, 'Event Deleted Successfully', []);
    }
}
