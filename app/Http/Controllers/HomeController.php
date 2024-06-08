<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $datas = array();
        $events = Event::all();
        foreach ($events as $event) {
            $datas[] = [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        }

        return view('pages.dashboard', [
            'type_menu' => 'home',
            'datas' => $datas,
        ]);
    }

    public function show()
    {
        $totalMahasiswa = User::where('role', 'user')->count();
        $datas = array();
        $events = Event::all();
        foreach ($events as $event) {
            $datas[] = [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        }

        return view('pages.dashboard', compact('totalMahasiswa', 'datas'));
    }
}
