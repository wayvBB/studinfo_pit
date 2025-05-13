<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

//Route::prefix('admin')->middleware('guest:admin')->group(function () {
//UNCOMMENT LANG NI
    Route::prefix('admin')->middleware('guest:admin')->group(function () {
        Route::get('login', action: [LoginController::class, 'create'])->name('admin.login');
        Route::post('login', [LoginController::class, 'store']);
        
        Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');
        Route::post('register', [RegisteredUserController::class, 'store']);
    });


Route::prefix('admin')->middleware(['auth:admin', 'admin'])->group(function () {

    //Route::get('/dashboard', function () {
    //    return view('admin.auth.dashboard');  

    //})->name('admin.auth.dashboard');

    // routes/admin-auth.php
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('admin.logout');
});

require __DIR__.'/auth.php';
