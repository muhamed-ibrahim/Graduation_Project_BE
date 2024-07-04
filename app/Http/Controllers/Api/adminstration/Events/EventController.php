<?php

namespace App\Http\Controllers\Api\adminstration\Events;

use Carbon\Carbon;
use App\Models\User;
use App\Models\AdEvent;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\adminstration\EventRequest;
use App\Http\Resources\adminstration\ShowEventResource;
use App\Notifications\AdminstrationNotification\EventNotification;



class EventController extends Controller
{
    public function addEvent(EventRequest $request)
    {
        $adminstration = Auth()->user()->adminstration;
        $event = new AdEvent();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->address = $request->address;
        $event->adminstration_id = $adminstration->id;
        $event->save();
        // Attach schools to the event
        $schools = $request->input('schools');
        if ($schools) {
            $event->Schools()->attach($schools);
        }
        $SchoolsToNotify = $event->Schools()->whereIn('school_id', $schools)->get();
        foreach ($SchoolsToNotify as $school) {
            Notification::send($school->Manager()->first(), new EventNotification($event, $adminstration, "تمت اضافة مناسبة جديد من قبل الادارة", "/Admin/Event/InfoEvent/" . $event->id));
            Notification::send($school->staff, new EventNotification($event, $adminstration, "تمت اضافة مناسبة جديد من قبل الادارة", "/Admin/Event/InfoEvent/" . $event->id));
        }
        return ApiResponse::sendResponse(201, 'Event added Successfully', []);
    }

    public function showEvent(Request $request)
    {
        $adminstration = Auth()->user()->adminstration->id;
        $events = AdEvent::where('adminstration_id', $adminstration)->get();
        foreach ($events as $event) {
            $eventDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $event->date . ' ' . $event->time);
            if (Carbon::now()->greaterThan($eventDateTime)) {
                $event->status = 1;
                $event->save();
            }
        }
        return ApiResponse::sendResponse(200, 'Events Retrived Successfully', ShowEventResource::collection($events));
    }

    public function updateEvent(EventRequest $request, $id)
    {
        $event = AdEvent::findorfail($id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->address = $request->address;
        $event->save();
        $schools = $request->input('schools');
        $event->Schools()->sync($schools);
        return ApiResponse::sendResponse(201, 'Event Updated Successfully', []);
    }

    public function deleteEvent($id)
    {
        $event = AdEvent::findorfail($id);
        $event->Schools()->detach();
        $event->delete();
        return ApiResponse::sendResponse(200, 'Event Deleted Successfully', []);
    }
}
