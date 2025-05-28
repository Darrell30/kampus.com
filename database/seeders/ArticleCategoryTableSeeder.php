<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;

class ArticleCategoryTableSeeder extends Seeder
{
    public function run()
    {
        $articles = Article::all();
        $categories = Category::all();

        foreach ($articles as $article) {
            // Pilih 1-3 kategori acak untuk setiap artikel
            $article->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
