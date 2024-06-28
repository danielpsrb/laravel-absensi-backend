<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UniversityController;

Route::get('/', function () {
    return view('pages.auth.auth-login');
})->middleware('guest');

//Route feature contact
Route::get('/features-contact', [ContactController::class, 'show'])->name('contact');

//Route feature activities
Route::get('/features-activities', [ProfileController::class, 'activities'])->name('activities');

//Route feature tickets
Route::get('/features-tickets', [ProfileController::class, 'tickets'])->name('tickets');

//Route feature post
Route::get('/features-post', [PostController::class, 'show'])->name('show');

//Route feature post
Route::get('/features-post/create', [PostController::class, 'create'])->name('create');

//Route feature post
Route::post('/features-post/store', [PostController::class, 'store'])->name('store');

Route::middleware(['admin', 'auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('home', [HomeController::class, 'show'])->name('home');

    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');

    //Route feature profile
    Route::get('/features-profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.delete');
    Route::post('/profile/change-password', [PasswordController::class, 'changePassword'])->name('profile.change-password');

    //Route feature settings
    Route::get('/features-settings', [SettingController::class, 'settings'])->name('settings');

    Route::get('/users/export/excel', [UserController::class, 'export_excel'])->name('users.export.excel');
    Route::post('/import-excel', [UserController::class, 'import_excel'])->name('users.import.excel');

    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('faculties', FacultyController::class);
    Route::resource('universites', UniversityController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('permissions', PermissionController::class);
});
