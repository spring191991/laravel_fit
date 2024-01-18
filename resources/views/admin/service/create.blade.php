@extends('layouts.admin', ['title' => 'Создание услуги'])

@section('content')
    <h1>Создание услуги</h1>
    <form method="post" action="{{ route('admin.service.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.service.part.form')
    </form>
@endsection