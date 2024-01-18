<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate();
        return response(view('admin.article.index', compact('articles')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('admin.article.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        if ($image) { // был загружен файл изображения
            $path = $image->store('article/source', 'public');
            $base = basename($path);
        }
        $data = $request->all();
        $data['image'] = $base ?? null;
        Article::create($data);
        return response(redirect()
            ->route('admin.article.index')
            ->with('success', 'Новая статья успешно создана'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return response(view('admin.article.edit', compact('article' )));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        if ($request->remove) { // если надо удалить изображение
            $old = $article->image;
            if ($old) {
                Storage::disk('public')->delete('article/source/' . $old);
            }
        }
        $file = $request->file('image');
        if ($file) { // был загружен файл изображения
            $path = $file->store('article/source', 'public');
            $base = basename($path);
            // удаляем старый файл изображения
            $old = $article->image;
            if ($old) {
                Storage::disk('public')->delete('article/source/' . $old);
            }
        }
        $data = $request->all();
        $data['image'] = $base ?? null;
        $article->update($data);
        $article->tags()->sync($request->tags);
        return response(redirect()
            ->route('admin.article.index', [])
            ->with('success', 'Статья успешно обновлена'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response(redirect()
            ->route('admin.article.index')
            ->with('success', 'Статья успешно удалена'));
    }
}
