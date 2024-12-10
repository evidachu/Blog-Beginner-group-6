<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Article;

class AdminController extends Controller
{
    public function dashboard()
    {
        $categoriesCount = Category::count();
        $tagsCount = Tag::count();
        $articlesCount = Article::count();

        return view('admin.dashboard', compact('categoriesCount', 'tagsCount', 'articlesCount'));
    }
}
