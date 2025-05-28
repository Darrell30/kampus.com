<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\User;
use App\Models\Article;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $articles = Article::all();

        foreach ($articles as $article) {
            foreach ($users as $user) {
                Comment::create([
                    'user_id' => $user->id,
                    'article_id' => $article->id,
                    'comment' => fake()->sentence(),
                ]);
            }
        }
    }
}

