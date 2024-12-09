<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     // Halaman Dashboard
     public function dashboard()
     {
         return view('admin.dashboard');
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
