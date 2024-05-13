<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UniversityController;

Route::get('/', function () {
    return view('pages.auth.auth-login');
});

Route::get('/auth-forgot-password', function () {
    return view('pages.auth.auth-forgot-password', ['type_menu' => 'auth']);
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('users', UserController::class);
    Route::resource('universites', UniversityController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('permissions', PermissionController::class);
});
