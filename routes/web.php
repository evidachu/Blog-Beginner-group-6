<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Routes Utama
|--------------------------------------------------------------------------
*/

// Halaman utama (Welcome)
Route::get('/', [ArticleController::class, 'index'])->name('articles.index');

// Halaman homepage (setelah login)
Route::get('/homepage', function () {
    return view('articles.index');
})->middleware(['auth', 'verified'])->name('homepage');

// Halaman About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Authentication routes (Laravel default)
require __DIR__.'/auth.php';


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


/*
|--------------------------------------------------------------------------
| Routes Artikel
|--------------------------------------------------------------------------
*/

Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/{id}', [ArticleController::class, 'show'])->name('articles.show');
});

/*
|--------------------------------------------------------------------------
| Routes Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Routes Admin
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Kelola kategori
    Route::resource('categories', CategoryController::class);

    // Kelola tag
    Route::resource('tags', TagController::class);

    // Kelola artikel
    Route::resource('articles', ArticleController::class);

    // Halaman kategori khusus admin
    Route::get('/kategori', [AdminController::class, 'kategori'])->name('kategori');

    // Halaman tag khusus admin
    Route::get('/tag', [AdminController::class, 'tag'])->name('tag');

    // Halaman artikel khusus admin
    Route::get('/artikel', [AdminController::class, 'artikel'])->name('artikel');
});
