<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        //check password saat ini
        if(!Hash::check($request->current_pwd, auth()->user()->password)){
            return redirect()->back()->with('error', 'Current Password invalid and not match');
        }

        //check password baru dengan konfirmasi password
        if($request->new_pwd != $request->confirm_pwd){
            return redirect()->back()->with('error', 'New Password and Confirm Password must match');
        }

        //update password
        auth()->user()->update(['password' => Hash::make($request->new_pwd)]);
        return redirect()->back()->with('status', 'Password updated successfully');
    }
}
