@extends('layouts.admin', ['title' => 'Создание статьи'])

@section('content')
    <h1>Создание статьи</h1>
    <form method="post" action="{{ route('admin.article.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.article.part.form')
    </form>
@endsection