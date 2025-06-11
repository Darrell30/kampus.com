<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $slug)
    {
        // Cek login manual
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }
        
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

    public function destroy(Comment $comment)
{
    // Hanya admin yang boleh hapus komentar
    if (auth()->user()->role !== 'admin') {
        abort(403, 'Anda tidak memiliki izin untuk menghapus komentar.');
    }

    $comment->delete();

    return back()->with('success', 'Komentar berhasil dihapus.');
}

}