<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $articles = Article::latest()->with(['user', 'categories'])->take(6)->get();

        return view('index', compact('categories', 'articles'));
    }
}
