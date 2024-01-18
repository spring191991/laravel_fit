<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{
    public function index() {
        $this->middleware('auth');
        $articles = Article::select('articles.*')
            ->orderBy('articles.created_at', 'desc')
            ->paginate(4);
        return view('pages.articles', ['articles' => $articles]);
    }

    public function show($id) {
        $articles = Article::select('articles.*')
            ->find($id);
        return view('pages.article', compact('articles'));
    }

    public function article(Article $article) {
        $articles = $article;
        return view('pages.article', compact('articles'));
    }

    public function tag(Tag $tag) {
        $articles = $tag->articles()
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        return view('pages.tag', compact('tag', 'articles'));
    }
}
