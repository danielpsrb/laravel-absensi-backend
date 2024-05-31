<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //index
    public function index(Request $request)
    {
        $departments = Department::when($request->input('name'), function ($query, $name) {
                $query->where('name', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString(); // Tambahkan withQueryString untuk menjaga parameter pencarian

        return view('pages.department.index', compact('departments'));
    }
}
