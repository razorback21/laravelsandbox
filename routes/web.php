<?php

use App\Http\Controllers\NoteBookController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Models\Notebook;
use App\Services\UserService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('notes', NoteController::class)->middleware('auth');
Route::resource('notebooks', NotebookController::class)->middleware('auth');

Route::get('/notebook/notes/{notebook}', [NotebookController::class, 'notes'])->name('notebooks.notes');

Route::get('/test', function (UserService $userService) {
    echo  $userService->createUser();
    echo "<br/>";
    return 'test';
});