<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //feature-profile
    public function profile()
    {
        return view('pages.profile.feature-profile');
    }

    //feature activities
    public function activities()
    {
        return view('pages.profile.feature-activities');
    }

    //feature tickets
    public function tickets()
    {
        return view('pages.profile.feature-tickets');
    }
}
