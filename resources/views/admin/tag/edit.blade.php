@extends('layouts.admin', ['title' => 'Редактирование тега'])

@section('content')
    <h1>Редактирование тега</h1>
    <form method="post" action="{{ route('admin.tag.update', ['tag' => $tag->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Наименование</label>
            <input type="text" class="form-control" name="name" placeholder="Наименование"
                   required maxlength="50" value="{{ old('name') ?? $tag->name ?? '' }}">
        </div>
        <div class="form-group">
            <label for="slug">ЧПУ</label>
            <input type="text" class="form-control" name="slug" placeholder="ЧПУ"
                   required maxlength="50" value="{{ old('slug') ?? $tag->slug ?? '' }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection