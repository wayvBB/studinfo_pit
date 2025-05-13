<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\LoadController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

// routes/web.php
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/update-info', [ProfileController::class, 'updateInfo'])->name('profile.update.info');
    Route::patch('/profile/update-avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
});

Route::get('/students/pdf', [StudentController::class, 'exportPDF'])->name('students.exportPDF');
Route::get('/instructors/pdf', [InstructorController::class, 'exportPDF'])->name('instructors.exportPDF');
Route::resource('students', StudentController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('instructors', InstructorController::class);
Route::resource('enroll', EnrollController::class);
Route::resource('loads', LoadController::class);

require __DIR__.'/auth.php';

require __DIR__.'/admin-auth.php';
