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
    public function index()
    {
        // Search berdasarkan nama, dengan pagination sebanyak 10
        $users = User::with(['department', 'faculty']) // Eager loading relasi
                    ->where('name', 'like', '%'.request('name').'%')
                    ->orderBy('id', 'desc')
                    ->paginate(10);

        return view('pages.users.index', compact('users'));
    }

    public function export_excel(Request $request)
    {
        if($request->format_file == 'xlsx') {
            $filename = 'users-'.date('d-m-Y').'.xlsx';
            return Excel::download(new ExportUser, $filename);
        }
        elseif($request->format_file == 'xls') {
            $filename = 'users-'.date('d-m-Y').'.xls';
            return Excel::download(new ExportUser, $filename);
        }
        else {
            $filename = 'users-'.date('d-m-Y').'.csv';
            return Excel::download(new ExportUser, $filename);
        }
    }

    public function import_excel(Request $request)
    {
        $request->validate([
            'import_excel' => 'required',
        ]);

        Excel::import(new UsersImport, $request->file('import_excel'));
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
