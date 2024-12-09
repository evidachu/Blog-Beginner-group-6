<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\Article;
>>>>>>> 83763a501e9b269ff14680dab6d28f4690712dcc
use Illuminate\Http\Request;

class ArticleController extends Controller
{
<<<<<<< HEAD
    //
=======
    public function index()
    {
        $articles = Article::all(); // Jika tabelnya benar-benar bernama 'articles'

        return view('articles.index', compact('articles'));
    }
>>>>>>> 83763a501e9b269ff14680dab6d28f4690712dcc
}
