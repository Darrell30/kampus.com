<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Hanya user login yang bisa kirim komentar
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $article = Article::where('slug', $slug)->firstOrFail();

        Comment::create([
            'user_id' => auth()->id(),
            'article_id' => $article->id,
            'comment' => $request->comment,
        ]);

        return redirect()->route('articles.show', $slug)->with('success', 'Komentar berhasil dikirim.');
    }
}
