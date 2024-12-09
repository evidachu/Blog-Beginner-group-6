<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [ArticleController::class, 'index'])->name('articles.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

<<<<<<< HEAD
Route::get('/about', function () {
    return view('about');
});


require __DIR__.'/auth.php';
=======
// Route untuk daftar artikel
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Route untuk detail artikel
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

// Route untuk halaman informasi statis
Route::get('/info', function () {
    return view('info');
})->name('info');

// Route untuk halaman admin
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Route untuk halaman dasbor admin
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Route untuk mengelola kategori
Route::get('/admin/kategori', [AdminController::class, 'kategori'])->name('admin.kategori');

// Route untuk mengelola tag
Route::get('/admin/tag', [AdminController::class, 'tag'])->name('admin.tag');

// Route untuk mengelola artikel
Route::get('/admin/artikel', [AdminController::class, 'artikel'])->name('admin.artikel');




>>>>>>> 83763a501e9b269ff14680dab6d28f4690712dcc
