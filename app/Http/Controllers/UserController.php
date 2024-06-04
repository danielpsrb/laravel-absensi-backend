<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Exports\ExportUser;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    //index
    public function index()
    {
        //search berdasarkan nama, dengan pagination sebanyak 10
        $users = User::where('name', 'like', '%'.request('name').'%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.users.index', compact('users'));
    }

    public function export_excel()
    {
        return Excel::download(new ExportUser, 'users.xlsx');
    }

    public function import_excel(Request $request)
    {
        $request->validate([
            'excel_file' => [
                'required',
                'mimes:xlsx,xls,csv',
            ]
            ]);

        Excel::import(new UsersImport, $request->file('excel_file'));
        return redirect()->route('users.index')->with('success', 'Data User berhasil diimport');
    }

    //create
    public function create()
    {
        $departments = Department::all();
        $faculties = Faculty::all();
        return view('pages.users.create', compact('departments', 'faculties'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*\d)[a-z\d]{8,}$/i',
            'department_id' => 'required|exists:departments,id',
            'faculty_id' => 'required|exists:faculties,id',

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nim' => $request->nim,
            'department_id' => $request->department_id,
            'faculty_id' => $request->faculty_id,
            'nip' => $request->nip,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Data User berhasil dibuat');
    }

    //tampilkan halaman edit users
    public function edit(User $user)
    {
        $departments = Department::all();
        $faculties = Faculty::all();
        return view('pages.users.edit', compact('user', 'departments', 'faculties'));
    }

    //update users
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'nip' => $request->nip,
            'role' => $request->role,
            'department_id' => $request->department_id,
            'faculty_id' => $request->faculty_id,
        ]);

        //jika password diisi
        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('users.index')->with('success', 'Data User berhasil diupdate');
    }

    //destroy atau hapus data user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Data User berhasil dihapus');
    }
}
