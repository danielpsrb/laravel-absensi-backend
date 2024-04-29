<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

    //create
    public function create()
    {
        return view('pages.users.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'required|min:8|regex:/^(?=.*[a-z])(?=.*\d)[a-z\d]{8,}$/i',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama harus berisi minimal 3 huruf',
            'email.required' => 'Email tidak boleh kosong dan harus diisi dengan benar',
            'email.email' => 'Email yang anda input tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.regex' => 'Password harus terdiri dari minimal 8 karakter dengan kombinasi huruf kecil, dan angka',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'nip' => $request->nip,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Data User berhasil dibuat');
    }
}
