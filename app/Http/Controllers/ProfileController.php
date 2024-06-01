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
        $user = auth()->user();
        return view('pages.profile.feature-profile', compact('user'));
    }

    //update-profile
    public function update(Request $request)
{
    $user = Auth::user();

    // Validasi data yang diterima
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Memperbarui nama dan email
    $user->name = $request->name;
    $user->email = $request->email;

    // Memeriksa apakah ada file foto yang diunggah
    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $imageName = $image->hashName();
        $image->storeAs('public/profiles', $imageName);
        $user->image_url = $imageName;
    }

    // Menyimpan perubahan
    $user->save();

    return redirect()->route('profile')->with('status', 'Profile updated successfully');
    }


    public function destroy()
    {
        $user =Auth::user();
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
