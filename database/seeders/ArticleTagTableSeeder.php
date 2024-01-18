<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Article;

class ArticleTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Article::all() as $article) {
            foreach(Tag::all() as $tag) {
                if (rand(1, 20) == 10) {
                    $article->tags()->attach($tag->id);
                }
            }
        }
    }
}
