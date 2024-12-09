<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     // Halaman Dashboard
     public function dashboard()
     {
         $categoriesCount = \App\Models\Category::count();
         $tagsCount = \App\Models\Tag::count();
         $articlesCount = \App\Models\Article::count(); // Tambahkan ini
     
         return view('admin.dashboard', compact('categoriesCount', 'tagsCount', 'articlesCount'));
     }
     
     

     // Halaman Mengelola Kategori
     public function kategori()
     {
         return view('admin.kategori');
     }

     // Halaman Mengelola Tag
     public function tag()
     {
         return view('admin.tag');
     }

     // Halaman Mengelola Artikel
     public function artikel()
     {
         return view('admin.artikel');
     }
}
