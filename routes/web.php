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


Route::middleware(['cek.login:mentee'])->group(function(){
    Route::get('/mentee', [MenteeController::class, 'index'])->name('mentee.index');
});
Route::middleware(['cek.login:mentor'])->group(function(){
    Route::get('/mentor', [MentorController::class, 'index'])->name('mentor.index');
});
Route::middleware(['cek.login:admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProses'])->name('registerProses');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/generate', [AdminController::class, 'generate'])->name('admin.generate');
