<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    //setting
    public function settings()
    {
        return view('pages.settings.feature-settings');
    }

    //setting detail
    public function settingDetail()
    {
        return view('pages.settings.feature-setting-detail');
    }
}
