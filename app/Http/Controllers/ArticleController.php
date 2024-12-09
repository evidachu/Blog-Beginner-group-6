<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all(); // Jika tabelnya benar-benar bernama 'articles'

        return view('articles.index', compact('articles'));
    }
}
