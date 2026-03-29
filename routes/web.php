<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get("/organizer", [HomeController::class, "indexOrganizer"])->name("organizer")->middleware("organizer");
    Route::get("/participant", [HomeController::class, "indexParticipant"])->name("participant");
    Route::patch('/tasks/{task}/status', [HomeController::class, 'updateStatus'])->name('tasks.status.update');

    Route::resource('tasks', TaskController::class)->middleware('organizer');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
