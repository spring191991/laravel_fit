<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Category::all();
        return response(view('admin.category.index', compact('items')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('admin.category.create'));
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
            $path = $image->store('category/source', 'public');
            $base = basename($path);
        }
        $data = $request->all();
        $data['image'] = $base ?? null;
        Category::create($data);
        return response(redirect()
            ->route('admin.category.index')
            ->with('success', 'Новая категория успешно создана'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return response(view('admin.category.edit', compact('category')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if ($request->remove) { // если надо удалить изображение
            $old = $category->image;
            if ($old) {
                Storage::disk('public')->delete('category/source/' . $old);
            }
        }
        $file = $request->file('image');
        if ($file) { // был загружен файл изображения
            $path = $file->store('category/source', 'public');
            $base = basename($path);
            // удаляем старый файл изображения
            $old = $category->image;
            if ($old) {
                Storage::disk('public')->delete('category/source/' . $old);
            }
        }
        $data = $request->all();
        $data['image'] = $base ?? null;
        $category->update($data);
        return response(redirect()
            ->route('admin.category.index')
            ->with('success', 'Категория успешно исправлена'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->services->count()) {
            $errors[] = 'Нельзя удалить категорию, которая содержит услуги';
        }
        if (!empty($errors)) {
            return response(back()->withErrors($errors));
        }
        $category->delete();
        return response(redirect()
            ->route('admin.category.index')
            ->with('success', 'Категория успешно удалена'));
    }
}
