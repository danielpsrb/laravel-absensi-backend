<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.dashboard', ['type_menu' => 'home']);
    }

    public function show()
    {
        $totalUsers = User::count();
        return view('pages.dashboard', compact('totalUsers'));
    }
}
