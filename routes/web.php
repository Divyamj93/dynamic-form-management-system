<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\UserController;
use App\Models\Submission;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalSubmissions' => Submission::count()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [FormController::class, 'dashboard']);

    Route::resource('forms', FormController::class);
    Route::resource('submissions', SubmissionController::class);

    Route::resource('users', UserController::class);

    Route::get('/import', [ImportController::class, 'index']);
    Route::post('/import', [ImportController::class, 'store']);

    Route::get('/export', [ExportController::class, 'export']);
});

Route::get('/form/{id}', [FormController::class, 'showForm']);
Route::post('/form/{id}', [FormController::class, 'submitForm']);

require __DIR__.'/auth.php';
