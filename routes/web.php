<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenteeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\AdminController;


Route::get('/', [AuthController::class, 'index'])->name('login');


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginProses'])->name('loginProses');


Route::middleware(['cek.login'])->group(function(){
    Route::get('/mentee', [MenteeController::class, 'index'])->name('mentee.index');
    Route::get('/mentor', [MentorController::class, 'index'])->name('mentor.index');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});
