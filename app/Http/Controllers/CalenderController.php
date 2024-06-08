<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalenderController extends Controller
{
    public function index()
    {
        $datas = array();
        $events = Event::all();
        foreach($events as $event) {
            $datas[] = [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        }
        return view('pages.calender.index', ['datas' => $datas]);
    }
}
