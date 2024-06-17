<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
{
    $departments = Department::when($request->input('name'), function ($query, $name) {
            $query->where('name', 'like', '%' . $name . '%');
        })
        ->with('faculty',) // Eager loading relasi faculty
        ->orderBy('id', 'asc')
        ->paginate(10)
        ->withQueryString();

    return view('pages.department.index', compact('departments'));
}

}
