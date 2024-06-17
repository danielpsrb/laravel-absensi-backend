<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index(Request $request)
    {
        $faculties = Faculty::with('departments')
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('pages.faculty.index', compact('faculties'));
    }


    //edit
    public function edit($id)
    {
        $faculty = Faculty::findOrFail($id);
        return view('pages.faculty.edit', compact('faculty'));
    }

    //update faculty
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'dean' => 'required|string|max:255',
        ]);

        $faculty = Faculty::findOrFail($id);
        $faculty->description = $request->description;
        $faculty->dean = $request->dean;
        $image = $request->file('logo');
        $imageName = $image->hashName();
        $image->storeAs('public/faculties', $imageName);
        $faculty->img_logo = $imageName;
        $faculty->save();
        return redirect()->route('faculties.index')->with('status', 'Faculty updated successfully');
    }

    //deleted
    public function destroy($id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();
        return redirect()->route('faculties.index')->with('status', 'Faculty deleted successfully');
    }
}
