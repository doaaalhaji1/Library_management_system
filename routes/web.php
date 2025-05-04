<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/set-locale', function (Illuminate\Http\Request $request) {
    $locale = $request->query('locale');

    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
        App::setLocale($locale);
    }

    return redirect()->back();
})->name('setLocale');
Route::middleware(['auth','role'])->group(function(){
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/create',[UserController::class,'create'])->name('users.create');
    Route::post('/courses',[UserController::class,'store'])->name('users.store');
    Route::get('/books',[BookController::class,'index'])->name('books.index');
    Route::get('/books/create',[BookController::class,'create'])->name('books.create');
    Route::post('/books',[BookController::class,'store'])->name('books.store');
    Route::patch('/books/{id}/toggle-availability', [BookController::class, 'toggleAvailability'])->name('books.toggleAvailability');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::patch('/books/{id}', [BookController::class, 'update'])->name('books.update');






  
  });
  Route::middleware('auth')->group(function(){
Route::get('/available-books', [BookController::class, 'availableBooks'])->name('books.available');
Route::post('/books/{book}/borrow', [BookController::class, 'borrow'])->name('books.borrow');
  });
require __DIR__.'/auth.php';
