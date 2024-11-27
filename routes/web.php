<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('tickets', TicketController::class);
    Route::post('tickets/{ticket}/assign', [TicketController::class, 'assignDeveloper'])->name('tickets.assign');
    Route::post('/tickets/{ticket}/commentaires', [CommentaireController::class, 'store'])->name('commentaires.store');
    Route::post('/tickets/{ticket}/cancel', [TicketController::class, 'cancel'])->name('tickets.cancel');
    Route::post('/tickets/{ticket}/resolve', [TicketController::class, 'resolve'])->name('tickets.resolve');


});

require __DIR__.'/auth.php';
