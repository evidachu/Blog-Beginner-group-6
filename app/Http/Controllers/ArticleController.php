<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        // Ambil data artikel terbaru
        $articles = Article::with('category', 'tags')->orderBy('created_at', 'desc')->get();

        // Kirim data ke view
        return view('articles.index', compact('articles'));
    }

    public function show($id)
{
    $article = Article::with(['category', 'user', 'tags'])->findOrFail($id);
    return view('articles.show', compact('article'));
}



}
