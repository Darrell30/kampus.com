<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->with(['user', 'categories', 'comments.user'])
            ->firstOrFail();

        return view('Article.show', compact('article'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Article.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
        ]);

        $imagePath = $request->file('image') 
            ? $request->file('image')->store('Articles', 'public') 
            : null;

        $article = Article::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . uniqid(),
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        $article->categories()->attach($request->categories);

        return redirect()->route('articles.show', $article->slug)->with('success', 'Artikel berhasil diposting.');
    }

    public function destroy($id)
{   
    // Tambahkan import Auth di atas file
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    if (auth()->user()->role !== 'admin') {
        abort(403, 'Unauthorized action.');
    }
    
    $article = Article::findOrFail($id);
    
    // Hapus gambar jika ada
    if ($article->image) {
        Storage::disk('public')->delete($article->image);
    }
    
    $article->delete();

    return redirect()->route('home')->with('success', 'Artikel berhasil dihapus.');
}
}
