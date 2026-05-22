<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('books', BookController::class);

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/faq/admin', [FaqController::class, 'adminIndex'])->name('faq.admin')->middleware('auth');
Route::post('/faq/category', [FaqController::class, 'storeCategory'])->name('faq.storeCategory')->middleware('auth');
Route::post('/faq/item', [FaqController::class, 'storeItem'])->name('faq.storeItem')->middleware('auth');
Route::delete('/faq/category/{category}', [FaqController::class, 'destroyCategory'])->name('faq.destroyCategory')->middleware('auth');
Route::delete('/faq/item/{item}', [FaqController::class, 'destroyItem'])->name('faq.destroyItem')->middleware('auth');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
Route::get('/contact/admin', [ContactController::class, 'adminIndex'])->name('contact.admin')->middleware('auth');
Route::put('/contact/{contact}/read', [ContactController::class, 'markAsRead'])->name('contact.markRead')->middleware('auth');
Route::delete('/contact/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';