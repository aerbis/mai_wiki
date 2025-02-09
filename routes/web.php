<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Models\Page;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'pages' => Page::all(),
        'rootpages' => Page::whereNull('parent_id')->get(),
        'currentpageid' => null,
    ]);
});

Route::resource('page', PageController::class)
    ->only(['create', 'store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('page', PageController::class)
    ->except(['create', 'store', 'update', 'destroy']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
