<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {

        $students = Student::with(['department', 'faculty']) // Eager loading relasi
                    ->where('name', 'like', '%'.request('name').'%')
                    ->orderBy('id', 'asc')
                    ->paginate(10);
        return view('pages.student.index', compact('students'));
    }

    public function create()
    {
        $departments = Department::all();
        $faculties = Faculty::all();
        $users = User::all();
        return view('pages.student.create', compact('departments', 'faculties', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|integer|unique:students,nim',
            'faculty_id' => 'required|exists:faculties,id',
            'department_id' => 'required|exists:departments,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $data = $request->all();

        $student = Student::create($data);

        if($request->hasFile('photo_student')) {
            $photoPath =  $request->file('photo_student');
            $photoName = time(). '.' . $photoPath->getClientOriginalExtension();
            $photoPath->storeAs('public/students', $photoName);

            $student->photo_url = $photoName;
            $student->save();
        }

        return redirect()->route('students.index')->with('success', 'Data Student berhasil ditambahkan');
    }

    public function edit(Student $student)
    {
        $departments = Department::all();
        $faculties = Faculty::all();
        return view('pages.student.edit', compact('student', 'departments', 'faculties'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|numeric|unique:students,nim,'.$student->id,
        ]);

        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'faculty_id' => $request->faculty_id,
            'department_id' => $request->department_id,
        ]);

        if($request->hasFile('photo_student')) {
            //delete old photo if exists
            if($student->photo_url) {
                Storage::delete('public/students/'.$student->photo_url);
            }
            $photoPath =  $request->file('photo_student');
            $photoName = time(). '.' . $photoPath->getClientOriginalExtension();
            $photoPath->storeAs('public/students', $photoName);
            $student->photo_url = $photoName;
        }

        $student->save();

        return redirect()->route('students.index')->with('success', 'Data Student berhasil diupdate');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Data Student berhasil dihapus');
    }
}
