<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::get('/user/create', function() {
        return view('user.create');
    })->name('user.create');

    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/upline-tree/{id}', [UserController::class, 'tree'])->name('user.tree');
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
});
