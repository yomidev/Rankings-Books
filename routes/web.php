<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [FrontendController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/authors',[AuthorController::class, 'index'])->name('admin.author.index');
    Route::get('/admin/country',[CountryController::class, 'index'])->name('admin.country');
    Route::get('/admin/country/create', [CountryController::class, 'create'])->name('admin.country.create');
    Route::post('/admin/country/save', [CountryController::class, 'save'])->name('admin.country.save');
    Route::get('/admin/country/edit/{id}', [CountryController::class, 'edit'])->name('admin.country.edit');
    Route::put('/admin/country/update/{id}', [CountryController::class, 'update'])->name('admin.country.update');
    Route::delete('/admin/country/delete/{id}', [CountryController::class, 'delete'])->name('admin.country.delete');
    Route::get('/admin/authors',[AuthorController::class, 'index'])->name('admin.author.index');
    Route::get('/admin/authors/create',[AuthorController::class, 'create'])->name('admin.author.create');
    Route::post('/admin/authors/save',[AuthorController::class, 'save'])->name('admin.author.save');
    Route::get('/admin/authors/edit/{id}',[AuthorController::class, 'edit'])->name('admin.author.edit');
    Route::put('/admin/authors/update/{id}',[AuthorController::class, 'update'])->name('admin.author.update');
    Route::delete('/admin/authors/delete/{id}',[AuthorController::class, 'delete'])->name('admin.author.delete');
    Route::get('/admin/genres', [GeneroController::class, 'index'])->name('admin.genres');
    Route::get('admin/genres/create',[GeneroController::class, 'create'])->name('admin.genres.create');
    Route::post('/admin/genres/save', [GeneroController::class, 'save'])->name('admin.genres.save');
    Route::get('/admin/genres/{id}/edit', [GeneroController::class, 'edit'])->name('admin.genres.edit');
    Route::put('/admin/genres/{id}/update', [GeneroController::class, 'update'])->name('admin.genres.update');
    Route::delete('/admin/genres/{id}/delete', [GeneroController::class, 'delete'])->name('admin.genres.delete');
    Route::get('/admin/books', [BookController::class, 'index'])->name('admin.books');
    Route::get('/admin/books/create', [BookController::class, 'create'])->name('admin.books.create');
    Route::post('/admin/books/save', [BookController::class, 'save'])->name('admin.books.save');
    Route::get('/admin/books/{id}/edit', [BookController::class, 'edit'])->name('admin.books.edit');
    Route::put('/admin/books/{id}/update', [BookController::class, 'update'])->name('admin.books.update');
    Route::delete('/admin/books/{id}/delete', [BookController::class, 'delete'])->name('admin.books.delete');

});

require __DIR__.'/auth.php';
