<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (! Gate::allows('privateview')) {
        return view('auth.wait');
    }
    return view('welcome', [
        'pages' => Page::all(),
        'rootpages' => Page::whereNull('parent_id')->get(),
        'currentpageid' => null,
    ]);
})->middleware(['auth', 'verified'])->name('/');

Route::resource('page', PageController::class)
    ->only(['create', 'store', 'update', 'destroy'])
    ->middleware(['auth', 'verified'])
    ->middleware('can:create, App\Models\Page');

Route::resource('page', PageController::class)
    ->except(['create', 'store', 'update', 'destroy'])
    ->middleware(['auth', 'verified'])
    ->middleware('can:view, App\Models\Page');

Route::get('/admin', function () {
    if (! Gate::allows('admin')) {
        abort(403);
    }
    return view('admin', ['users' => User::all()]);
})->middleware(['auth', 'verified'])->name('admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
