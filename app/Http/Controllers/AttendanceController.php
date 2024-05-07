<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //show data attendances
    public function index(Request $request)
    {
        $attendances = Attendance::with('user')
            ->when($request->input('name'), function ($query, $name) {
                $query->whereHas('user', function ($query) use ($name) {
                    $query->where('name', 'like', '%' . $name . '%');
                });
            })->orderBy('id', 'desc')->paginate(10);
            return view('pages.absensi.show', compact('attendances'));
    }

    //edit data attendances
    public function edit($id)
    {
        $attendance = Attendance::find($id);
        return view('pages.absensi.edit', compact('attendance'));
    }

    //update attendances
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'date' => 'required',
            'time_in' => 'required',
            'time_out' => 'required',
        ]);

        $attendance = Attendance::find($id);
        $attendance->update($request->all());

        return redirect()->route('attendances.index')->with('success', 'Data Absensi berhasil diupdate');
    }
}
