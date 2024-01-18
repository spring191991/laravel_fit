@extends('layouts.admin', ['title' => 'Редактирование статьи'])

@section('content')
    <h1 class="text-center">Редактирование статьи</h1>
    <form method="post" enctype="multipart/form-data"
          action="{{ route('admin.article.update', ['article' => $article->id]) }}">
        @method('PUT')
        @include('admin.article.part.form')
    </form>
@endsection