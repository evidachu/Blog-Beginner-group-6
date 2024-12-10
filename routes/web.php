<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\ArticleController2;
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


// Route untuk login
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

    // Rute untuk resource articles2, yang secara otomatis menangani CRUD termasuk 'edit'
    Route::resource('articles2', ArticleController2::class);

    // Kelola kategori
    Route::resource('categories', CategoryController::class);

    // Kelola tag
    Route::resource('tags', TagController::class);

    // Halaman kategori khusus admin
    Route::get('/kategori', [AdminController::class, 'kategori'])->name('kategori');

    // Halaman tag khusus admin
    Route::get('/tag', [AdminController::class, 'tag'])->name('tag');

    // Rute untuk menampilkan daftar artikel
    Route::get('articles2', [ArticleController2::class, 'index'])->name('articles2.index');

    // Rute untuk menampilkan form pembuatan artikel baru
    Route::get('articles2/create', [ArticleController2::class, 'create'])->name('articles2.create');

    // Rute untuk menyimpan artikel
    Route::post('articles2', [ArticleController2::class, 'store'])->name('articles2.store');
});