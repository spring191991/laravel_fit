<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Tag::paginate(10);
        return response(view('admin.tag.index', compact('items')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('admin.tag.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all(), null)->validate();
        Tag::create($request->all());
        return response(redirect()
            ->route('admin.tag.index')
            ->with('success', 'Новый тег успешно создан'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return response(view('admin.tag.edit', compact('tag')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validator($request->all(), $tag->id)->validate();
        $tag->update($request->all());
        return response(redirect()
            ->route('admin.tag.index')
            ->with('success', 'Тег успешно исправлен'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response(redirect()
            ->route('admin.tag.index')
            ->with('success', 'Тег успешно удален'));
    }

    /**
     * Возвращает объект валидатора с нужными правилами
     */
    private function validator($data, $id) {
        $unique = 'unique:tags,slug';
        if ($id) {
            // проверка на уникальность slug тега при редактировании,
            // исключая этот тег по идентифкатору в таблице БД tags
            $unique = 'unique:tags,slug,'.$id.',id';
        }
        $rules = [
            'name' => [
                'required',
                'string',
                'max:50',
            ],
            'slug' => [
                'required',
                'max:50',
                $unique,
                'regex:~^[-_a-z0-9]+$~i',
            ]
        ];
        $messages = [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'max' => 'Поле «:attribute» должно быть не больше :max символов',
        ];
        $attributes = [
            'name' => 'Наименование',
            'slug' => 'ЧПУ (англ.)'
        ];
        return Validator::make($data, $rules, $messages, $attributes);
    }
}
