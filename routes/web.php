<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('/dashboard', [ApplicationController::class, 'index'])->name('dashboard');
    Route::get('/add-application', [ApplicationController::class, 'create'])->name('application.create');
    Route::post('/add-application', [ApplicationController::class, 'store'])->name('application.store');
    Route::get('/edit-application/{application}', [ApplicationController::class, 'edit'])->name('application.edit');
    Route::put('/edit-application/{application}', [ApplicationController::class, 'update'])->name('application.update');
    Route::delete('/delete-application/{application}', [ApplicationController::class, 'destroy'])->name('application.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
