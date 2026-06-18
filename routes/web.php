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
    Route::get('/mentee/module', [MenteeController::class, 'module'])->name('mentee.module');
    Route::get('/mentee/navbar', [MenteeController::class, 'navbar'])->name('mentee.navbar');
    Route::get('/mentee/module/{id}', [MenteeController::class, 'activity'])->name('mentee.detail');
    Route::get('/mentee/module/activity/{id_module}', [MenteeController::class], 'activity')->name('mentee.activty');
});
Route::middleware(['cek.login:mentor'])->group(function(){
    Route::get('/mentor', [MentorController::class, 'index'])->name('mentor.index');
});
Route::middleware(['cek.login:admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/generate', [AdminController::class, 'generate'])->name('admin.generate');
    Route::delete('/admin/users/{id}', [AdminController::class, 'usersDestroy'])->name('admin.users.destroy');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'usersEdit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [AdminController::class, 'usersUpdate'])->name('admin.users.update');
    Route::get('/admin/user/create', [AdminController::class, 'usersCreate'])->name('admin.users.create');
    Route::post('/admin/users', [AdminController::class, 'usersStore'])->name('admin.users.store');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProses'])->name('registerProses');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


