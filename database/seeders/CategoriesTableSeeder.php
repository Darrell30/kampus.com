<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run()
    {
        $list = ['Politik', 'Ekonomi', 'Teknologi', 'Olahraga', 'Hiburan'];

        foreach ($list as $item) {
            Category::create([
                'name' => $item,
                'slug' => Str::slug($item)
            ]);
        }
    }
}
