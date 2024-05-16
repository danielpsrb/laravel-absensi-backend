<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UniversityController;

Route::get('/', function () {
    return view('pages.auth.auth-login');
});

//Route feature profile
Route::get('/features-profile', [ProfileController::class, 'profile'])->name('profile');

//Route feature activities
Route::get('/features-activities', [ProfileController::class, 'activities'])->name('activities');

//Route feature tickets
Route::get('/features-tickets', [ProfileController::class, 'tickets'])->name('tickets');

//Route feature settings
Route::get('/features-settings', [SettingController::class, 'settings'])->name('settings');

//Route feature settings detail
Route::get('/features-settings-detail', [SettingController::class, 'settingDetail'])->name('setting-detail');

//Route feature post
Route::get('/features-post', [PostController::class, 'show'])->name('show');

//Route feature post
Route::get('/features-post/create', [PostController::class, 'create'])->name('create');

//Route feature post
Route::post('/features-post/store', [PostController::class, 'store'])->name('store');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('users', UserController::class);
    Route::resource('universites', UniversityController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('permissions', PermissionController::class);
});
