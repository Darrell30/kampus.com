<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use App\Models\Article;
use App\Models\User;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            for ($i = 1; $i <= 3; $i++) {
                $title = fake()->sentence(5);
                Article::create([
                    'user_id' => $user->id,
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'content' => fake()->paragraph(10),
                    'image' => 'default.jpg', // ganti jika ada upload nanti
                ]);
            }
        }
    }
}

