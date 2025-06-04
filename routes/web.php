<?php

use App\Http\Controllers\Admin\CitaController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('tasks',TaskController::class)->names('tasks');
    Route::resource('cites',CitaController::class)->names('cites');
    Route::resource('posts',PostController::class)->names('posts');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
