<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //index
    public function index()
    {
        return view('pages.profile.feature-profile');
    }

    //update-profile
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    public function destroy(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->delete();
        return redirect()->route('login')->with('success', 'Profile deleted successfully');
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
