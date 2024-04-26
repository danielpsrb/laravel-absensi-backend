<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //index
    public function index()
    {
        //search berdasarkan nama, dengan pagination sebanyak 10
        $users = User::where('name', 'like', '%'.request('name').'%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.user.index', compact('users'));
    }
}
