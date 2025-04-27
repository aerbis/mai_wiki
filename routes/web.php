<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
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
        return view('welcome', [
            'pages' => Page::all(),
            'rootpages' => Page::whereNull('parent_id')->get(),
            'currentpageid' => null,
        ]);
    }
    return view('admin', ['users' => User::all()]);
})->middleware(['auth', 'verified'])->name('admin');

Route::put('role/reader/{id}', function(string $id) {
    if (! Gate::allows('admin')) {
        abort(403);
    }

    $u = User::where('id', $id)->get();
    Log::info($u);
    $user = User::where('id', $id)->get()[0];
    Log::info($user);
    $user->role = 'reader';
    $user->save();

    return redirect()->route('admin', ['users' => User::all()]);
});

Route::put('role/writer/{id}', function(string $id) {
    if (! Gate::allows('admin')) {
        abort(403);
    }

    $u = User::where('id', $id)->get();
    Log::info($u);
    $user = User::where('id', $id)->get()[0];
    $user->role = 'writer';
    Log::info($user);
    $user->save();

    return redirect()->route('admin', ['users' => User::all()]);
});

Route::put('role/adminrole/{id}', function(string $id) {
    if (! Gate::allows('admin')) {
        abort(403);
    }
    
    $u = User::where('id', $id)->get();
    Log::info($u);
    $user = User::where('id', $id)->get()[0];
    $user->role = 'admin';
    Log::info($user);
    $user->save();

    return redirect()->route('admin', ['users' => User::all()]);
});

Route::delete('user/{id}', function(string $id) {
    if (! Gate::allows('admin')) {
        abort(403);
    }

    Log::info($id);
    
    $user = User::where('id', $id);
    $user->delete();

    return redirect()->route('admin', ['users' => User::all()]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
