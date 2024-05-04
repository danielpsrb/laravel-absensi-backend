<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    //show
    public function show($id)
    {
        $university = University::find(1);
        return view('pages.university.show', compact('university'));
    }

    //edit
    public function edit($id)
    {
        $university = University::find(1);
        return view('pages.university.edit', compact('university'));
    }

    //update
    public function update(Request $request, University $university)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone_number' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'radius_km' => 'required',
            'time_in' => 'required',
            'time_out' => 'required',
        ]);

        $university->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'radius_km' => $request->radius_km,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
        ]);

        return redirect()->route('university.show', $university->id)->with('success', 'University updated successfully');
    }
}
