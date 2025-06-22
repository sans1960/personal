<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CitaController;
use App\Http\Controllers\Admin\ImageSpaceController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class,'index'])->name('index');
Route::get('/home',[FrontController::class,'home'])->name('home');
Route::get('/spaceimage',[FrontController::class,'spaceImages'])->name('spaceimage');
Route::get('/spaceimage/{id}',[FrontController::class,'oneImage'])->name('oneimage');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('tasks',TaskController::class)->names('tasks');
    Route::resource('cites',CitaController::class)->names('cites');
    Route::resource('posts',PostController::class)->names('posts');
    Route::resource('sites',SiteController::class)->names('sites');
    Route::resource('/categories',CategoryController::class)->names('categories');
    Route::resource('/suppliers',SupplierController::class)->names('suppliers');
    Route::get('/imagesspace', [ImageSpaceController::class, 'index'])->name('space.index');
    Route::get('/imagesspace/create', [ImageSpaceController::class, 'createImage'])->name('space.create');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
