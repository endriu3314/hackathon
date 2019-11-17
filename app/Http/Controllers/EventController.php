<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\EventAttendance;
use View;

class EventController extends Controller
{
    public function createReq(){
        return view('events.new');
    }

    public function show($id) {
        $event     = Event::findOrFail($id);
        $attending = EventAttendance::where('event_id', $id)->where('status', '=', 1)->get();
        
        return view('events.show', [
            'event'     => $event,
            'attending' => $attending
        ]);
    }


    public function store(Request $request) {
        $this->validate($request, [
            'title'       => 'required',
            'date'        => 'required|date',
            'time'        => 'required',
        ]);
        
        $event = new Event;
        
        $event->user_id     = Auth::id();
        $event->name        = $request->input('title');
        $event->date        = Carbon::parse($request->input('date'));
        $event->time        = $request->input('time');
        
        $event->save();
        
        return redirect()->back();
    }

    public function index() {
        $events = DB::table('events')->orderBy('id')->get();
        
        return view('events.index', [
            'events' => $events,
        ]);
    }

    public function setAttendance($event_id, $mode) {
        if (EventAttendance::where('event_id', $event_id)->where('user_id', Auth::id())->count()) {
            $event_attendance = EventAttendance::where('event_id', $event_id)->where('user_id', Auth::id())->first();
            
            $event_attendance->status = $mode;
            
            $event_attendance->save();
            
            return redirect()->route('event', $event_id);
        }
        
        $event_attendance = new EventAttendance();
        
        $event_attendance->user_id  = Auth::id();
        $event_attendance->event_id = $event_id;
        $event_attendance->status   = $mode;
        
        $event_attendance->save();
        
        return redirect()->route('event', $event_id);
    }

    public function getEvents(){
        $res = null;

        try {
            $res = Event::all()->toJson();
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('301');
        }

        return $res;
    }

    public function getEventsAttendance(){
        $res = null;

        try {
            $res = EventAttendance::where('status', '=', 1)->get()->toJson();
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('301');
        }

        return $res;
    }

}
